<?php

namespace App\Http\Controllers\Api;

use App\Models\BuiltRfpForm;
use App\Models\ContingencyLeadership;
use App\Models\CoreCoverage;
use App\Models\CoreReinsuranceSolution;
use App\Models\CorporateCredit;
use App\Models\Faq;
use App\Models\Hero;
use App\Models\Item;
use App\Models\LongtermCommitment;
use App\Models\MakesDifferent;
use App\Models\MarketExperience;
use App\Models\ModelBuilt;
use App\Models\MortgageCredit;
use App\Models\NotConfusion;
use App\Models\OurPhilosophy;
use App\Models\OurProcess;
use App\Models\PortfolioCredit;
use App\Models\Review;
use App\Models\StructuredSolution;
use App\Models\TeamOverview;
use App\Models\TheProblem;
use App\Models\UnderwritingApproach;
use App\Models\WorkingPlan;

class DivisionController
{
    public function credit()
    {

        $hero = Hero::select('title_one', 'title_two', 'highlight_text', 'primary_button_text', 'primary_button_link', 'secondary_button_text', 'secondary_button_link')->where('page_name', 'credit')->first();
        $CorporateCredit = CorporateCredit::first();
        $PortfolioCredit = PortfolioCredit::first();
        $StructuredSolution = StructuredSolution::get();
        $MortgageCredit = MortgageCredit::first();
        $teamOverview = TeamOverview::first();
        $faq = Faq::where('page', 'credit')->get();

        return response()->json([

            'status' => 'success',
            'hero' => $hero,
            'corporate_credit' => $CorporateCredit,
            'portfolio_credit' => $PortfolioCredit,
            'structured_solution' => $StructuredSolution,
            'mortgage_credit' => $MortgageCredit,
            'teamOverview' => $teamOverview,
            'faq' => $faq,

        ], 200);
    }

    public function contingency()
    {

        $hero = Hero::select('title_one', 'highlight_text', 'description_one', 'primary_button_text', 'primary_button_link', 'secondary_button_text', 'secondary_button_link', 'short_title_one', 'short_title_two', 'short_description_one', 'short_description_two')->where('page_name', 'contingency')->first();
        $coreCoverage = CoreCoverage::orderBy('id', 'desc')->get();
        $underwritingApproach = UnderwritingApproach::orderBy('id', 'desc')->get();
        $ContingencyLeadership = ContingencyLeadership::first();
        $faq = Faq::where('page', 'contingency')->get();

        return response()->json([

            'status' => 'success',
            'hero' => $hero,
            'core_coverage' => $coreCoverage,
            'underwriting_approach' => $underwritingApproach,
            'ContingencyLeadership' => $ContingencyLeadership,
            'faq' => $faq,

        ], 200);
    }

    public function medicalStopLoss()
    {

        $hero = Hero::select('title_one', 'highlight_text', 'description_one', 'description_two', 'primary_button_text', 'primary_button_link', 'secondary_button_text', 'secondary_button_link')->where('page_name', 'medical-stop-loss')->first();
        $theProblem = TheProblem::first();
        $theProblemItem = Item::where('section_name', 'the_problem')->get();
        $notConfishion = NotConfusion::first();
        $notConfishionItem = Item::where('section_name', 'not_confusion')->get();
        $makeDifferenc = MakesDifferent::get();
        $ourProcess = OurProcess::get();
        $modelBuilt = ModelBuilt::get();
        $builtRfpForm = BuiltRfpForm::first();
        $reviews = Review::orderBy('id', 'desc')->get();
        $workingPlan = WorkingPlan::first();
        $faq = Faq::where('page', 'medical-stop-loss')->get();

        return response()->json([

            'status' => 'success',
            'hero' => $hero,
            'the_problem' => $theProblem,
            'the_problem_item' => $theProblemItem,
            'not_confusion' => $notConfishion,
            'not_confusion_item' => $notConfishionItem,
            'make_different' => $makeDifferenc,
            'our_process' => $ourProcess,
            'model_builts' => $modelBuilt,
            'built_rfp_form' => $builtRfpForm,
            'reviews' => $reviews,
            'working_plan' => $workingPlan,
            'faq' => $faq,

        ], 200);
    }

    public function excessReinsurance()
    {

        $hero = Hero::select('highlight_text', 'description_one', 'primary_button_text', 'primary_button_link', 'secondary_button_text', 'secondary_button_link')->where('page_name', 'excess-reinsurance')->first();
        $faq = Faq::where('page', 'excess-reinsurance')->get();
        $CoreReinsuranceSolution = CoreReinsuranceSolution::first();
        $coreReinsuranceSolutionItem = Item::where('section_name', 'core_reinsurance_solution')->get();
        $ourPhilosphy = OurPhilosophy::first();
        $marketExpertise = MarketExperience::first();
        $LongtermCommitment = LongtermCommitment::first();

        return response()->json([

            'status' => 'success',
            'hero' => $hero,
            'core_reinsurance_solution' => $CoreReinsuranceSolution,
            'core_reinsurance_solution_item' => $coreReinsuranceSolutionItem,
            'our_philosphy' => $ourPhilosphy,
            'market_expertise' => $marketExpertise,
            'longterm_commitment' => $LongtermCommitment,
            'faq' => $faq,
        ], 200);
    }
}
