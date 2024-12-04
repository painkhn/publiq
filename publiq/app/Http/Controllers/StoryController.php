<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\View;
use App\Models\Category;
use Auth;

class StoryController extends Controller
{
    public function open_new_story() 
    // Открытие страницы написания исории
    {
        $categories = Category::all();
        return view('create_story', compact('categories'));
    }
    public function new_story(Request $request)
    // Создание новой истории
    {
        $validated = $request->validate([
            // Валидация
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Story::create([
            // Добавление в бд
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id, // Сохранение категории
        ]);
        // Перенаправляем на профиль
        return redirect(route('Profile'));
    }
    public function show_story($id) 
    // Открытие истории
    {
        $story = Story::with('user')->with('category')->where('id', $id)->first(); // Получаем историю из бд по ее id
        $views = View::where('user_id', Auth::user()->id)->where('story_id', $id)->first(); // Добавляем просмотр +1
        if (!$views) {
            View::create([
                'user_id' => Auth::user()->id,
                'story_id' => $id
            ]);
        }
        return view('story', ['story' => $story]); // Открываем страницу истории и передаем данные о истории из бд
    }
    public function editor_story($id)
    // Редактирование истории
    {
        $story = Story::with('user')->where('id', $id)->first(); // Получаем историю из бд по ее id
        if ($story->user->id == Auth::user()->id) // Если создатель истории это зарегистрированный пользователь
        { // Открываем страницу изменения
            return view('edit_story', ['story' => $story]);
        } else { // Либо перенаправляем назад
            return redirect()->back();
        }
    }
    public function edit_story($id, Request $request) // Редактирование истории
    {
        Story::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]); // Обновляем данные 
        $story = Story::where('id', $id)->first(); // Получаем историю из бд по ее id

        return view('story', ['story' => $story]); // Открываем страницу истории и передаем данные о истории из бд
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $query = $request->input('query');
        $categoryId = $request->input('category_id');

        $populars = Story::query();

        if ($query) {
            $populars->where('name', 'like', "%$query%");
        }

        if ($categoryId) {
            $populars->where('category_id', $categoryId);
        }

        $populars = $populars->get();

        return view('catalog', compact('categories', 'populars'));
    }
}
