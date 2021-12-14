<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $reg)
    {
        $contact = new Contact();
        $contact->name = $reg->input('name');
        $contact->email = $reg->input('email');
        $contact->subject = $reg->input('subject');
        $contact->message = $reg->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    public function updateMessageSubmit($id, ContactRequest $reg)
    {
        $contact = Contact::find($id);
        $contact->name = $reg->input('name');
        $contact->email = $reg->input('email');
        $contact->subject = $reg->input('subject');
        $contact->message = $reg->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
    }

    public function alldata()
    {
        // Получить одну запись по id
        // $id = 1;
        // $contacts = Contact::find($id);

        // Получить две рандомные записи
        // $contacts = Contact::inRandomOrder()->limit(2)->get();

        // Получить все записи в рандомном порядке
        // $contacts = Contact::inRandomOrder()->get();

        // Получить ограниченное количество записей через limit() или take()
        // $contacts = Contact::orderBy('id', 'asc')->take(3)->get();

        // Получить все записи
        $contacts = Contact::all();

        // Пропустить определенное количество записей
        // $contacts = Contact::orderBy('id', 'asc')->skip(2)->take(3)->get();

        // Получить записи по определенному условию
        // $contacts = Contact::where('subject', '=', 'Тестовая тема')->get();

        // Получить записи по отсутствующему условию
        // $contacts = Contact::where('subject', '<>', 'Тестовая тема')->get();

        return view('messages', ['contacts' => $contacts]);
    }

    public function showOneMessage($id)
    {
        $contact = Contact::find($id);
        return view('one-message', ['contact' => $contact]);
    }

    public function updateMessage($id)
    {
        $contact = Contact::find($id);
        return view('update-message', ['contact' => $contact]);
    }

    public function deleteMessage($id)
    {
        $contact = Contact::find($id)->delete();
        return redirect()->route('contact-all')->with('success', 'Сообщение было удалено');
    }

}
