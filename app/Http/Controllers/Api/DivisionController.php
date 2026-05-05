<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\CorporateCredit;
use App\Models\PortfolioCredit;
use App\Models\StructuredSolution;
use App\Models\MortgageCredit;
use App\Models\TeamOverview;
use App\Models\UnderwritingApproach;
use App\Models\ContingencyLeadership;
use App\Models\CoreCoverage;
use App\Models\Faq;

class DivisionController
{
    public function credit(){
        
        $hero = Hero::select('title_one', 'title_two', 'highlight_text','primary_button_text','primary_button_link', 'secondary_button_text', 'secondary_button_link')->where('page_name', 'credit')->first(); 
        $CorporateCredit = CorporateCredit::first();
        $PortfolioCredit = PortfolioCredit::first();
        $StructuredSolution = StructuredSolution::get();
        $MortgageCredit =  MortgageCredit::first();
        $teamOverview = TeamOverview::first();
        $faq = Faq::where('page', 'credit')->get();

        return response()->json([

            "status" => "success",
            "hero" => $hero,
            "corporate_credit" => $CorporateCredit,
            "portfolio_credit" => $PortfolioCredit,
            "structured_solution" => $StructuredSolution,
            "mortgage_credit" => $MortgageCredit,
            "teamOverview" => $teamOverview,
            "faq" => $faq,

        ], 200);
    }

    public function contingency(){

        $hero = Hero::select('title_one','highlight_text','description_one','primary_button_text','primary_button_link', 'secondary_button_text', 'secondary_button_link','short_title_one','short_title_two', 'short_description_one', 'short_description_two')->where('page_name', 'contingency')->first(); 
        $coreCoverage = CoreCoverage::orderBy('id', 'desc')->get();
        $underwritingApproach = UnderwritingApproach::orderBy('id', 'desc')->get();
        $ContingencyLeadership = ContingencyLeadership::first();
        $faq = Faq::where('page', 'contingency')->get();
        return response()->json([

            "status" => "success",
            "hero" => $hero,
            "core_coverage" => $coreCoverage,
            "underwriting_approach" => $underwritingApproach,
            "ContingencyLeadership" => $ContingencyLeadership,
            "faq" => $faq,

        ], 200);
    }
}
