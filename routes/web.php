<?php

use App\Http\Controllers\BackedByAmyntaGroupController;
use App\Http\Controllers\BackedStrengthAmyntaController;
use App\Http\Controllers\CommitmentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ContingencyLeadershipController;
use App\Http\Controllers\CoreCoverageController;
use App\Http\Controllers\CoreReinsuranceSolutionController;
use App\Http\Controllers\CorporateCreditController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\LongtermCommitmentController;
use App\Http\Controllers\MarketExperienceController;
use App\Http\Controllers\MortgageCreditController;
use App\Http\Controllers\OurPhilosophyController;
use App\Http\Controllers\OurProcessController;
use App\Http\Controllers\PortfolioCreditController;
use App\Http\Controllers\ReachOutController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\SpecialtyRiskController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\StructuredSolutionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamOverviewController;
use App\Http\Controllers\UnderwriteController;
use App\Http\Controllers\UnderwritingApproachController;
use App\Http\Controllers\BuiltRfpFormController;
use App\Http\Controllers\MakesDifferentController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\WorkingPlanController;
use App\Http\Controllers\ModelBuiltController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::get('/register', function () {
    return redirect(route('login'));
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    // Hero
    Route::get('/hero', [HeroController::class, 'index'])->name('hero.index');
    Route::get('/hero/create', [HeroController::class, 'create'])->name('hero.create');
    Route::post('/hero/store', [HeroController::class, 'store'])->name('hero.store');
    Route::get('/hero/edit/{id}', [HeroController::class, 'edit'])->name('hero.edit');
    Route::post('/hero/update/{id}', [HeroController::class, 'update'])->name('hero.update');
    Route::delete('/hero/destroy/{id}', [HeroController::class, 'destroy'])->name('hero.destroy');

    // Faq
    Route::resource('faqs', FaqController::class);
    // Specialty Risk
    Route::resource('specialty-risk', SpecialtyRiskController::class);
    // Divisions
    Route::get('/our-divisions', [DivisionController::class, 'index'])->name('divisions.index');
    Route::get('/divisions/create', [DivisionController::class, 'create'])->name('divisions.create');
    Route::post('/divisions/store', [DivisionController::class, 'store'])->name('divisions.store');
    Route::get('/divisions/edit/{id}', [DivisionController::class, 'edit'])->name('divisions.edit');
    Route::post('/divisions/update/{id}', [DivisionController::class, 'update'])->name('divisions.update');
    Route::delete('/divisions/destroy/{id}', [DivisionController::class, 'destroy'])->name('divisions.destroy');

    // Team
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/update/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/destroy/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

    // Specialist
    Route::get('/specialists', [SpecialistController::class, 'index'])->name('specialists.index');
    Route::get('/specialists/create', [SpecialistController::class, 'create'])->name('specialists.create');
    Route::post('/specialists/store', [SpecialistController::class, 'store'])->name('specialists.store');
    Route::get('/specialists/edit/{id}', [SpecialistController::class, 'edit'])->name('specialists.edit');
    Route::post('/specialists/update/{id}', [SpecialistController::class, 'update'])->name('specialists.update');
    Route::delete('/specialists/destroy/{id}', [SpecialistController::class, 'destroy'])->name('specialists.destroy');

    // about
    Route::get('/works', [WorkController::class, 'index'])->name('work.index');
    Route::get('/works/create', [WorkController::class, 'create'])->name('work.create');
    Route::post('/works/store', [WorkController::class, 'store'])->name('work.store');
    Route::get('/works/edit/{id}', [WorkController::class, 'edit'])->name('work.edit');
    Route::post('/works/update/{id}', [WorkController::class, 'update'])->name('work.update');
    Route::delete('/works/destroy/{id}', [WorkController::class, 'destroy'])->name('work.destroy');

    // backed Amynta Group
    Route::get('/backed-amynta-group', [BackedByAmyntaGroupController::class, 'index'])->name('backedAmyntaGroup.index');
    Route::post('/backed-amynta-group/update', [BackedByAmyntaGroupController::class, 'update'])->name('backedAmyntaGroup.update');

    // Commitment
    Route::get('/commitment', [CommitmentController::class, 'index'])->name('commitment.index');
    Route::post('/commitment/update', [CommitmentController::class, 'update'])->name('commitment.update');

    // contact
    Route::get('/contact', [ContactUsController::class, 'index'])->name('contact.index');
    Route::get('/contact/edit/{id}', [ContactUsController::class, 'edit'])->name('contact.edit');
    Route::post('/contact/update/{id}', [ContactUsController::class, 'update'])->name('contact.update');
    Route::delete('/contact/destroy/{id}', [ContactUsController::class, 'destroy'])->name('contact.destroy');

    Route::get('/reach-out', [ReachOutController::class, 'index'])->name('reachOut.index');
    Route::get('/reach-out/create', [ReachOutController::class, 'create'])->name('reachOut.create');
    Route::post('/reach-out/store', [ReachOutController::class, 'store'])->name('reachOut.store');
    Route::get('/reach-out/edit/{id}', [ReachOutController::class, 'edit'])->name('reachOut.edit');
    Route::post('/reach-out/update/{id}', [ReachOutController::class, 'update'])->name('reachOut.update');
    Route::delete('/reach-out/destroy/{id}', [ReachOutController::class, 'destroy'])->name('reachOut.destroy');

    // Setting
    Route::get('/others-settings', [SettingController::class, 'edit'])->name('othersSettings.index');
    Route::post('/others-settings/update', [SettingController::class, 'update'])->name('othersSettings.update');

    // Underwrite
    Route::get('/how-we-underwrite', [UnderwriteController::class, 'index'])->name('underwrite.index');
    Route::post('/how-we-underwrite/update', [UnderwriteController::class, 'update'])->name('underwrite.update');

    // backed-strength
    Route::get('/backed-strength', [BackedStrengthAmyntaController::class, 'index'])->name('backedStrength.index');
    Route::post('/backed-strength/update', [BackedStrengthAmyntaController::class, 'update'])->name('backedStrength.update');

    // structure
    Route::get('/our-structure', [StructureController::class, 'index'])->name('structure.index');
    Route::get('/our-structure/create', [StructureController::class, 'create'])->name('structure.create');
    Route::post('/our-structure/store', [StructureController::class, 'store'])->name('structure.store');
    Route::get('/our-structure/edit/{id}', [StructureController::class, 'edit'])->name('structure.edit');
    Route::post('/our-structure/update/{id}', [StructureController::class, 'update'])->name('structure.update');
    Route::delete('/our-structure/destroy/{id}', [StructureController::class, 'destroy'])->name('structure.destroy');

    // Get In Touch
    Route::get('/get-in-touch', [GetInTouchController::class, 'index'])->name('getInTouch.index');
    Route::post('/get-in-touch/update', [GetInTouchController::class, 'update'])->name('getInTouch.update');

    // Corporate Credit
    Route::get('/corporate-credit', [CorporateCreditController::class, 'index'])->name('corporateCredit.index');
    Route::post('/corporate-credit/update', [CorporateCreditController::class, 'update'])->name('corporateCredit.update');

    // Portfolio Credit
    Route::get('/portfolio-credit', [PortfolioCreditController::class, 'index'])->name('portfolioCredit.index');
    Route::post('/portfolio-credit/update', [PortfolioCreditController::class, 'update'])->name('portfolioCredit.update');

    // Structured Solution
    Route::get('/structured-solution', [StructuredSolutionController::class, 'index'])->name('structuredSolution.index');
    Route::get('/structured-solution/create', [StructuredSolutionController::class, 'create'])->name('structuredSolution.create');
    Route::post('/structured-solution/store', [StructuredSolutionController::class, 'store'])->name('structuredSolution.store');
    Route::get('/structured-solution/edit/{id}', [StructuredSolutionController::class, 'edit'])->name('structuredSolution.edit');
    Route::post('/structured-solution/update/{id}', [StructuredSolutionController::class, 'update'])->name('structuredSolution.update');
    Route::delete('/structured-solution/destroy/{id}', [StructuredSolutionController::class, 'destroy'])->name('structuredSolution.destroy');

    // Team Overview
    Route::get('/team-overview', [TeamOverviewController::class, 'index'])->name('teamOverview.index');
    Route::post('/team-overview/update', [TeamOverviewController::class, 'update'])->name('teamOverview.update');

    // Mortgage Credit
    Route::get('/mortgage-credit', [MortgageCreditController::class, 'index'])->name('mortgageCredit.index');
    Route::post('/mortgage-credit/update', [MortgageCreditController::class, 'update'])->name('mortgageCredit.update');

    // Core Coverage
    Route::get('/core-coverage', [CoreCoverageController::class, 'index'])->name('coreCoverage.index');
    Route::get('/core-coverage/create', [CoreCoverageController::class, 'create'])->name('coreCoverage.create');
    Route::post('/core-coverage/store', [CoreCoverageController::class, 'store'])->name('coreCoverage.store');
    Route::get('/core-coverage/edit/{id}', [CoreCoverageController::class, 'edit'])->name('coreCoverage.edit');
    Route::post('/core-coverage/update/{id}', [CoreCoverageController::class, 'update'])->name('coreCoverage.update');
    Route::delete('/core-coverage/destroy/{id}', [CoreCoverageController::class, 'destroy'])->name('coreCoverage.destroy');

    // Underwriting Approach
    Route::get('/underwriting-approach', [UnderwritingApproachController::class, 'index'])->name('underwritingApproach.index');
    Route::get('/underwriting-approach/create', [UnderwritingApproachController::class, 'create'])->name('underwritingApproach.create');
    Route::post('/underwriting-approach/store', [UnderwritingApproachController::class, 'store'])->name('underwritingApproach.store');
    Route::get('/underwriting-approach/edit/{id}', [UnderwritingApproachController::class, 'edit'])->name('underwritingApproach.edit');
    Route::post('/underwriting-approach/update/{id}', [UnderwritingApproachController::class, 'update'])->name('underwritingApproach.update');
    Route::delete('/underwriting-approach/destroy/{id}', [UnderwritingApproachController::class, 'destroy'])->name('underwritingApproach.destroy');

    // Makes Different
    Route::get('/makes-different', [MakesDifferentController::class, 'index'])->name('makesDifferent.index');
    Route::get('/makes-different/create', [MakesDifferentController::class, 'create'])->name('makesDifferent.create');
    Route::post('/makes-different/store', [MakesDifferentController::class, 'store'])->name('makesDifferent.store');
    Route::get('/makes-different/edit/{id}', [MakesDifferentController::class, 'edit'])->name('makesDifferent.edit');
    Route::post('/makes-different/update/{id}', [MakesDifferentController::class, 'update'])->name('makesDifferent.update');
    Route::delete('/makes-different/destroy/{id}', [MakesDifferentController::class, 'destroy'])->name('makesDifferent.destroy');

    // Our Process
    Route::get('/our-process', [OurProcessController::class, 'index'])->name('ourProcess.index');
    Route::get('/our-process/create', [OurProcessController::class, 'create'])->name('ourProcess.create');
    Route::post('/our-process/store', [OurProcessController::class, 'store'])->name('ourProcess.store');
    Route::get('/our-process/edit/{id}', [OurProcessController::class, 'edit'])->name('ourProcess.edit');
    Route::post('/our-process/update/{id}', [OurProcessController::class, 'update'])->name('ourProcess.update');
    Route::delete('/our-process/destroy/{id}', [OurProcessController::class, 'destroy'])->name('ourProcess.destroy');

    // Model Built
    Route::get('/model-built', [ModelBuiltController::class, 'index'])->name('modelBuilt.index');
    Route::get('/model-built/create', [ModelBuiltController::class, 'create'])->name('modelBuilt.create');
    Route::post('/model-built/store', [ModelBuiltController::class, 'store'])->name('modelBuilt.store');
    Route::get('/model-built/edit/{id}', [ModelBuiltController::class, 'edit'])->name('modelBuilt.edit');
    Route::post('/model-built/update/{id}', [ModelBuiltController::class, 'update'])->name('modelBuilt.update');
    Route::delete('/model-built/destroy/{id}', [ModelBuiltController::class, 'destroy'])->name('modelBuilt.destroy');

    // Built Rfp Form
    Route::get('/built-rfp-form', [BuiltRfpFormController::class, 'index'])->name('builtRfpForm.index');
    Route::post('/built-rfp-form/update', [BuiltRfpFormController::class, 'update'])->name('builtRfpForm.update');

    // Review
    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/edit/{id}', [ReviewController::class, 'edit'])->name('review.edit');
    Route::post('/review/update/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/destroy/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

    // working plan
    Route::get('/working-plan', [WorkingPlanController::class, 'index'])->name('workingPlan.index');
    Route::post('/working-plan/update', [WorkingPlanController::class, 'update'])->name('workingPlan.update');

    // Contingency Leadership
    Route::get('/contingency-leadership', [ContingencyLeadershipController::class, 'index'])->name('contingencyLeadership.index');
    Route::post('/contingency-leadership/update', [ContingencyLeadershipController::class, 'update'])->name('contingencyLeadership.update');

    // Core Reinsurance Solutions
    Route::get('/core-reinsurance-solution', [CoreReinsuranceSolutionController::class, 'index'])->name('coreReinsuranceSolution.index');
    Route::post('/core-reinsurance-solution/update', [CoreReinsuranceSolutionController::class, 'update'])->name('coreReinsuranceSolution.update');

    // Our Philosophy
    Route::get('/our-philosophy', [OurPhilosophyController::class, 'index'])->name('ourPhilosophy.index');
    Route::post('/our-philosophy/update', [OurPhilosophyController::class, 'update'])->name('ourPhilosophy.update');

    // Market Experience
    Route::get('/market-experience', [MarketExperienceController::class, 'index'])->name('marketExperience.index');
    Route::post('/market-experience/update', [MarketExperienceController::class, 'update'])->name('marketExperience.update');

    // Long Term Commitment
    Route::get('/long-term-commitment', [LongtermCommitmentController::class, 'index'])->name('longtermCommitment.index');
    Route::post('/long-term-commitment/update', [LongtermCommitmentController::class, 'update'])->name('longtermCommitment.update');

});

require __DIR__.'/settings.php';
