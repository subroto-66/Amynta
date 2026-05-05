<?php

namespace Database\Seeders;

use App\Models\PortfolioCredit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortfolioCredit::insert([
            [
                'title' => 'Insurance & Reinsurance',
                'description' => 'Offering non-payment coverages for a pool of debtors to provide capital relief and optimize returns for banking insureds.',
                'item_one_number' => '1',
                'item_one_text' => 'High attachment points, near investment grade',
                'item_two_number' => '2',
                'item_two_text' => 'Low frequency, low severity expectations',
                'item_three_number' => '3',
                'item_three_text' => 'Alignment with insureds and junior tranche participants',
                'asset_classes_one_title' => 'Corporate Loan Portfolios',
                'asset_classes_one_icon' => '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M12 6h.01"></path><path d="M12 10h.01"></path><path d="M12 14h.01"></path><path d="M16 10h.01"></path><path d="M16 14h.01"></path><path d="M8 10h.01"></path><path d="M8 14h.01"></path></svg>',
                'asset_classes_two_title' => 'Infrastructure & Project Finance',
                'asset_classes_two_icon' => '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2a8 8 0 0 0-8 8v6h16V10a8 8 0 0 0-8-8Z"></path><path d="M12 22h6a2 2 0 0 0 2-2v-2H2v2a2 2 0 0 0 2 2h16z"></path><line x1="8" x2="8" y1="16" y2="20"></line><line x1="16" x2="16" y1="16" y2="20"></line></svg>',
                'asset_classes_three_title' => 'Mortgage-backed Loans',
                'asset_classes_three_icon' => '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2a8 8 0 0 0-8 8v6h16V10a8 8 0 0 0-8-8Z"></path><path d="M12 22h6a2 2 0 0 0 2-2v-2H2v2a2 2 0 0 0 2 2h16z"></path><line x1="8" x2="8" y1="16" y2="20"></line><line x1="16" x2="16" y1="16" y2="20"></line></svg>',
                'asset_classes_four_title' => 'Consumer & Commercial ABS',
                'asset_classes_four_icon' => '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M12 6h.01"></path><path d="M12 10h.01"></path><path d="M12 14h.01"></path><path d="M16 10h.01"></path><path d="M16 14h.01"></path><path d="M8 10h.01"></path><path d="M8 14h.01"></path></svg>',
            ],
        ]);
    }
}
