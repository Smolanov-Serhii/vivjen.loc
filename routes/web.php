<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\BlockTemplateGroupController;
use App\Http\Controllers\BlockContentController;
use App\Http\Controllers\BlockTemplateController;
use App\Http\Controllers\BlockTemplateAttributeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ModuleItemController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleRepeaterController;
use App\Http\Controllers\TaxonomyItemController;
use App\Http\Controllers\TaxonomyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\BlockTemplateRepeaterIterationController;
use App\Http\Controllers\BlockTemplateRepeaterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionGroupController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Forum\TopicController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryItemController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\FormController;
use \App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

//Route::get('cabinet', [HomeController::class, 'index'])
//    ->name('cabinet')
//    ->middleware('auth');

//Route::domain('{domain}')->group(function ($domain) {

//    Route::get('user/{id}', function ($domain, $id) {
//
//    });
//});

Auth::routes();
/** Admin Panel */
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
    'as' => 'admin.'
], function () {
    \Illuminate\Support\Facades\App::setLocale('ru');
    Route::get('', function () {
        return redirect('admin/pages');
    });

    Route::prefix('letter')->group(function () {
        Route::get('export', [LetterController::class, 'export'])->name('letter.export');
    });

    Route::prefix('pages')->group(function () {
        Route::get('', [PageController::class, 'index'])->name('pages.list');
        Route::get('create', [PageController::class, 'create'])->name('pages.create');
        Route::post('create', [PageController::class, 'store'])->name('pages.store');
        Route::get('edit/{page}', [PageController::class, 'edit'])->name('pages.edit');
        Route::post('update/{page}', [PageController::class, 'update'])->name('pages.update');
        Route::delete('delete/{page}', [PageController::class, 'destroy'])->name('pages.delete');
        Route::prefix('content')->group(function () {
            Route::get('update/{page}', [BlockController::class, 'index'])->name('pages.content.update');
            Route::post('reorder/{model_name}/{model_id}', [BlockController::class, 'updateBlocksOrder'])->name('blocks.order.update');
        });
    });

    Route::prefix('blocks')->group(function () {
        Route::post('create/{model_name}/{model_id}', [BlockController::class, 'store'])->name('blocks.create');
        Route::get('edit/{block}', [BlockController::class, 'edit'])->name('blocks.edit');
        Route::post('update/{block}', [BlockController::class, 'update'])->name('blocks.update');
        Route::post('delete/{block}', [BlockController::class, 'destroy'])->name('blocks.delete');
    });

    Route::prefix('contents')->group(function () {
        Route::get('edit/{block}', [BlockContentController::class, 'edit'])->name('contents.edit');
        Route::post('update/{block}', [BlockContentController::class, 'update'])->name('contents.update');
        Route::post('delete', [BlockContentController::class, 'destroy'])->name('contents.delete');
    });

    Route::prefix('block_templates')->group(function () {
        Route::get('', [BlockTemplateController::class, 'index'])->name('block_templates.list');
        Route::get('create', [BlockTemplateController::class, 'create'])->name('block_templates.create');
        Route::post('create', [BlockTemplateController::class, 'store'])->name('block_templates.store');
        Route::post('load', [BlockTemplateController::class, 'load'])->name('block_templates.load');
        Route::get('edit/{block_template}', [BlockTemplateController::class, 'edit'])->name('block_templates.edit');
        Route::post('update/{block_template}', [BlockTemplateController::class, 'update'])->name('block_templates.update');
        Route::get('delete/{block_template}', [BlockTemplateController::class, 'destroy'])->name('block_templates.delete');
        Route::prefix('attributes')->group(function () {
            Route::get('template/{attribute_type}/{parent_id}', [BlockTemplateAttributeController::class, 'template'])->name('block_templates.attributes.template');
        });
    });

    Route::prefix('block_template_repeaters')->group(function () {
        Route::get('{block_template_repeater}/{parent_type}/{parent_id}/{language}', [BlockTemplateRepeaterController::class, 'show'])->name('block_template_repeaters.template');
    });

    Route::prefix('block_template_repeater_iterations')->group(function () {
        Route::delete('{iteration}', [BlockTemplateRepeaterIterationController::class, 'destroy'])->name('block_template_repeater_iterations.delete');
    });

    Route::prefix('block_template_groups')->group(function () {
        Route::get('', [BlockTemplateGroupController::class, 'index'])->name('template.groups.list');
        Route::get('create', [BlockTemplateGroupController::class, 'create'])->name('template.groups.create');
        Route::post('create', [BlockTemplateGroupController::class, 'store'])->name('template.groups.store');
    });

    Route::prefix('variables')->group(function () {
        Route::get('', [VariableController::class, 'index'])->name('variables.list');
        Route::get('create', [VariableController::class, 'create'])->name('variables.create');
        Route::post('create', [VariableController::class, 'store'])->name('variables.store');
        Route::get('edit/{variable}', [VariableController::class, 'edit'])->name('variables.edit');
        Route::post('update/{variable}', [VariableController::class, 'update'])->name('variables.update');
        Route::delete('delete/{variable}', [VariableController::class, 'destroy'])->name('variables.delete');
    });

    Route::prefix('galleries')->group(function () {
        Route::get('', [GalleryController::class, 'index'])->name('galleries.list');
        Route::get('create', [GalleryController::class, 'create'])->name('galleries.create');
        Route::post('create', [GalleryController::class, 'store'])->name('galleries.store');
        Route::get('edit/{gallery}', [GalleryController::class, 'edit'])->name('galleries.edit');
        Route::post('update/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
        Route::delete('delete/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.delete');
        Route::prefix('items')->group(function () {
            Route::post('sort', [GalleryItemController::class, 'sort'])->name('galleries.items.sort');
            Route::get('list/{gallery}', [GalleryItemController::class, 'index'])->name('galleries.items.list');
            Route::post('create/{gallery}', [GalleryItemController::class, 'store'])->name('galleries.items.store');
            Route::get('update/{gallery_item}', [GalleryItemController::class, 'edit'])->name('galleries.items.update');
            Route::post('update/{gallery_item}', [GalleryItemController::class, 'update'])->name('galleries.items.update');
            Route::delete('delete/{gallery_item}', [GalleryItemController::class, 'destroy'])->name('galleries.items.delete');
        });
    });

    Route::prefix('forms')->group(function () {
        Route::get('', [FormController::class, 'index'])->name('forms.list');
        Route::get('create', [FormController::class, 'create'])->name('forms.create');
        Route::post('create', [FormController::class, 'store'])->name('forms.store');
        Route::get('edit/{form}', [FormController::class, 'edit'])->name('forms.edit');
        Route::post('update/{form}', [FormController::class, 'update'])->name('forms.update');
        Route::delete('delete/{form}', [FormController::class, 'destroy'])->name('forms.delete');
    });

    Route::prefix('contacts')->group(function () {
        Route::get('', [ContactController::class, 'index'])->name('contacts.list');
        Route::get('create', [ContactController::class, 'create'])->name('contacts.create');
        Route::post('create', [ContactController::class, 'store'])->name('contacts.store');
        Route::get('edit/{variable}', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::post('update/{variable}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('delete/{variable}', [ContactController::class, 'destroy'])->name('contacts.delete');
    });

    Route::prefix('menu')->group(function () {
        Route::post('create-menu',[menuController::class,'store']);
        Route::get('add-categories-to-menu',[menuController::class,'addCatToMenu']);
        Route::get('add-post-to-menu',[menuController::class,'addPostToMenu']);
        Route::get('add-custom-link',[menuController::class,'addCustomLink']);
        Route::get('update-menu',[menuController::class,'updateMenu']);
        Route::post('update-menuitem/{id}',[menuController::class,'updateMenuItem']);
        Route::get('delete-menuitem/{id}/{key}/{in?}',[menuController::class,'deleteMenuItem']);
        Route::get('delete-menu/{id}',[menuController::class,'destroy']);
        Route::get('{id?}',[MenuController::class,'index'])->name('menu.list');
    });

    Route::prefix('modules')->group(function () {
        Route::get('', [ModuleController::class, 'index'])->name('modules.list');
        Route::get('create', [ModuleController::class, 'create'])->name('modules.create');
        Route::post('create', [ModuleController::class, 'store'])->name('modules.store');
        Route::get('update/{module}', [ModuleController::class, 'edit'])->name('modules.update');
        Route::post('update/{module}', [ModuleController::class, 'update'])->name('modules.update');
        Route::delete('delete/{module}', [ModuleController::class, 'destroy'])->name('modules.delete');
        Route::prefix('items')->group(function () {
            Route::get('list/{module}', [ModuleItemController::class, 'index'])->name('modules.items.list');
            Route::get('create/{module}', [ModuleItemController::class, 'create'])->name('modules.items.create');
            Route::post('create/{module}', [ModuleItemController::class, 'store'])->name('modules.items.store');
            Route::get('update/{module_item}', [ModuleItemController::class, 'edit'])->name('modules.items.update');
            Route::post('update/{module_item}', [ModuleItemController::class, 'update'])->name('modules.items.update');
            Route::delete('delete/{module_item}', [ModuleItemController::class, 'destroy'])->name('modules.items.delete');

        });
    });


    Route::prefix('taxonomy')->group(function () {
        Route::get('', [TaxonomyController::class, 'index'])->name('taxonomy.list');
        Route::get('create', [TaxonomyController::class, 'create'])->name('taxonomy.create');
        Route::post('create', [TaxonomyController::class, 'store'])->name('taxonomy.store');
        Route::get('edit/{taxonomy}', [TaxonomyController::class, 'edit'])->name('taxonomy.edit');
        Route::post('update/{taxonomy}', [TaxonomyController::class, 'update'])->name('taxonomy.update');
        Route::delete('delete/{taxonomy}', [TaxonomyController::class, 'destroy'])->name('taxonomy.delete');
        Route::prefix('items')->group(function () {
            Route::get('list/{taxonomy}', [TaxonomyItemController::class, 'index'])->name('taxonomy.items.list');
            Route::get('create/{taxonomy}', [TaxonomyItemController::class, 'create'])->name('taxonomy.items.create');
            Route::post('create/{taxonomy}', [TaxonomyItemController::class, 'store'])->name('taxonomy.items.store');
            Route::get('update/{taxonomy_item}', [TaxonomyItemController::class, 'edit'])->name('taxonomy.items.edit');
            Route::post('update/{taxonomy_item}', [TaxonomyItemController::class, 'update'])->name('taxonomy.items.update');
            Route::delete('delete/{taxonomy_item}', [TaxonomyItemController::class, 'destroy'])->name('taxonomy.items.delete');
        });
    });

    Route::resource('user', UserController::class)
        ->except(['show', 'create', 'store']);

    Route::resource('role', RoleController::class)
        ->except(['show']);

    Route::resource('permission', PermissionController::class)
        ->except(['show']);

    Route::resource('permission_group', PermissionGroupController::class)
        ->except(['show']);

    Route::resource('widget', WidgetController::class)
        ->except(['show']);

    Route::post('language/update_status/{language}', [LanguageController::class, 'updateStatus'])->name('language.update_status');
    Route::resource('language', LanguageController::class)
        ->except(['show']);

    Route::post('comment/moderate/{comment}', [CommentController::class, 'moderate'])->name('comment.moderate');
    Route::post('review/moderate/{review}', [ReviewController::class, 'moderate'])->name('review.moderate');
    Route::resource('comment', CommentController::class)
        ->except(['show']);

    Route::prefix('module_repeaters')->group(function () {
        Route::get('{moduleRepeater}/{parent_iteration_id}', [ModuleRepeaterController::class, 'show'])->name('module_repeaters.template');
    });

    Route::prefix('upload')->group(function () {
        Route::post('image', [UploadController::class, 'image'])->name('upload.image');
    });
});

Route::group([
//    'middleware' => 'auth',
    'as' => 'client.'
], function () {
    Route::prefix('mail')->group(function () {
        Route::post('laraform', [App\Http\Controllers\MailController::class, 'laraform'])->name('laraform.send');
        Route::post('send', [App\Http\Controllers\MailController::class, 'send'])->name('mail.send');
    });

    foreach (\App\Models\Module::all() as $module) {
        Route::prefix($module->name)->group(function () use ($module) {
            Route::get('{alias}', [App\Http\Controllers\ModuleItemController::class, 'item'])->name("{$module->name}.item");
        });
    }

    Route::prefix('letter')->group(function () {
        Route::post('store', [LetterController::class, 'store'])->name('letter.store');
    });

    Route::post('add-trening', [CabinetController::class, 'addTrening'])->name('add.trening');
    Route::post('delete-trening', [CabinetController::class, 'deleteTrening'])->name('delete.trening');

    Route::post('sync', [ModuleItemController::class, 'syncModuleItem'])->name('module.item.sync');

    Route::post('reviews/store', [ReviewController::class, 'store'])->name('reviews.store');

    Route::post('table/show', [TableController::class, 'show'])->name('table.show');

    Route::get('favorite/trenings', [CabinetController::class, 'getFavorites'])->name('get.favorites');
    Route::get('added/trenings', [CabinetController::class, 'addedTrenings'])->name('added.trenings');
    Route::get('delete/added/trenings', [CabinetController::class, 'deleteAddedTrenings'])->name('delete.added.trenings');
    Route::get('all/trenings', [CabinetController::class, 'allTrenings'])->name('all.trenings');
    Route::get('get/added/trenings', [CabinetController::class, 'getAddedTrenings'])->name('get.added.trenings');

    Route::get('get-by-day/trenings', [CabinetController::class, 'getByDayTrenings'])->name('get.byday.trenings');

    Route::post('quiz/store', [QuizController::class, 'store'])->name('quiz.store');

    Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
});

Route::prefix('topic')->group(function () {
    Route::get('', [TopicController::class, 'index'])->name('client.topic.index');
});
Route::get('search', [SearchController::class, 'index'])->name('client.search');
Route::get('module_items/filter/{params?}', [ModuleItemController::class, 'filter'])->name('client.module_items.filter');

Route::group([
    'prefix' => '{lang?}',
    'where' => ['lang' => '[a-zA-Z]{2}'],
    'middleware' => ['locale', 'variables']
], function () {
//    foreach (\App\Models\Module::all() as $module) {
//        Route::prefix($module->name)->group(function () use ($module) {
//            Route::get('{alias}', [App\Http\Controllers\ModuleItemController::class, 'item'])->name("{$module->name}.item");
//        });
//    }
//    Route::prefix('landings')->group(function (){
//    Route::get('/', [ModuleItemController::class, 'site']);
//    });
    Route::get('{alias?}', [PageController::class, 'show'])->name('client.page.show');
});
Route::get('{alias?}', [PageController::class, 'show'])->name('client.page.show')->middleware(['locale', 'variables']);
Route::get('/comment/create/{comment}', [CommentController::class, 'create'])->name('client.comment.create')->middleware('auth');
Route::post('/comment/create', [CommentController::class, 'store'])->name('client.comment.store')->middleware('auth');
