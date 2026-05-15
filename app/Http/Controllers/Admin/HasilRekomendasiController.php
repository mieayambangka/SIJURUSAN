<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilRekomendasi;
use App\Models\User;
use Illuminate\Http\Request;

class HasilRekomendasiController extends Controller
{
    public function index()
    {
        // Fetch all recommendations grouped by user, ordered by score
        $allRecommendations = HasilRekomendasi::with(['user', 'jurusan'])
            ->orderByDesc('score')
            ->get();

        // Format data for frontend JavaScript
        $groupedByUser = $allRecommendations->groupBy('user_id');
        $studentRecommendations = $groupedByUser->map(function ($userRecs) {
            $firstRec = $userRecs->first();
            if (!$firstRec || !$firstRec->user) {
                return null;
            }
            
            $user = $firstRec->user;
            $recs = $userRecs->take(3)->map(function ($rec) {
                return [
                    'j' => $rec->jurusan->name ?? 'Unknown',
                    's' => floatval($rec->score),
                ];
            })->values()->toArray();

            // Skip if less than 3 recommendations or has missing data
            if (count($recs) < 1) {
                return null;
            }

            return [
                'id' => '#ST' . str_pad($user->id, 4, '0', STR_PAD_LEFT),
                'name' => $user->name,
                'recs' => $recs,
            ];
        })->filter()->values()->toArray();

        return view('admin.hasil.index', compact('studentRecommendations'));
    }

    public function show(User $user)
    {
        $recommendations = HasilRekomendasi::with('jurusan')
            ->where('user_id', $user->id)
            ->orderByDesc('score')
            ->get();

        return view('admin.hasil.show', compact('user', 'recommendations'));
    }
}
