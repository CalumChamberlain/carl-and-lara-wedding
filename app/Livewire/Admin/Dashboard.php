<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class Dashboard extends Component
{
    private $possibleMessages = [
        'Hi {{ user.name }}, love is in the air! Your wedding is just around the corner.',
        'Hi {{ user.name }}, get ready to say "I do" in {{ daysToGo }} days!',
        'Hi {{ user.name }}, the countdown to your wedding has begun! Are you ready?',
        'Hi {{ user.name }}, love is patient, love is kind. Your wedding day is almost here.',
        'Hi {{ user.name }}, it\'s time to celebrate your love story! Your wedding is approaching.',
        'Hi {{ user.name }}, prepare to dance the night away at your wedding in {{ daysToGo }} days!',
        'Hi {{ user.name }}, the wait is almost over! Your dream wedding is just a few days away.',
        'Hi {{ user.name }}, the best is yet to come! Your wedding day is just around the corner.',
        'Hi {{ user.name }}, love is like a beautiful flower. Watch it bloom on your wedding day.',
        'Hi {{ user.name }}, the stars have aligned for your special day. Your wedding is coming soon!',
        'Love is not just a word, it\'s a promise. Get ready, {{ user.name }}, your wedding day is only {{ daysToGo }} days away!',
        'A beautiful love story is about to unfold. {{ user.name }}, prepare for your special day in just {{ daysToGo }} days!',
        'Two souls, one journey. Counting down the days, {{ user.name }}, until your wedding day arrives!',
        'Love knows no bounds, and your wedding day is proof. Only {{ daysToGo }} days left, {{ user.name }}, until your magical celebration.',
        'Happiness is contagious, especially on a wedding day. Get ready to spread joy, {{ user.name }}, in just {{ daysToGo }} days!',
        'Love is like a flower, blooming with each passing day. {{ user.name }}, your wedding day is blossoming in {{ daysToGo }} days!',
        'It\'s not just a wedding, it\'s the beginning of forever. Prepare to embark on this beautiful journey, {{ user.name }}, in just {{ daysToGo }} days!',
        'The countdown is on, {{ user.name }}! Your wedding day is approaching fast, with only {{ daysToGo }} days left to go.',
        'True love is rare, and your wedding day is a testament to that. Celebrate this extraordinary bond, {{ user.name }}, in just {{ daysToGo }} days!',
        'Love is patient, love is kind, and it\'s almost time for your happily ever after, {{ user.name }}. Only {{ daysToGo }} days to go!',
        'Your love story is about to take center stage. Get ready to shine, {{ user.name }}, as your wedding day arrives in {{ daysToGo }} days!',
        'Two hearts, one love, and an unforgettable celebration. {{ user.name }}, your wedding day is just {{ daysToGo }} days away!',
        'It\'s a beautiful day to say, "I do." {{ user.name }}, get ready for your wedding day, coming up in {{ daysToGo }} days!',
        'Love is the key that unlocks a lifetime of happiness. {{ user.name }}, prepare to open the door to forever, in just {{ daysToGo }} days!',
        'Dreams do come true, especially on your wedding day. Get ready to live the fairy tale, {{ user.name }}, with only {{ daysToGo }} days left!',
        'The stage is set, the love is real. {{ user.name }}, it\'s almost time for your grand wedding day, in just {{ daysToGo }} days!',
        'Love is a journey, and your wedding day marks the beginning of a beautiful adventure, {{ user.name }}. Only {{ daysToGo }} days left to embark!',
        'Two souls intertwine, two hearts beat as one. Prepare for the most incredible day of your life, {{ user.name }}, in just {{ daysToGo }} days!',
        'The stars have aligned, and your wedding day is drawing near, {{ user.name }}. Get ready for an enchanting celebration in only {{ daysToGo }} days!',
        'Love is the music that fills your heart, and your wedding day is the perfect symphony, {{ user.name }}. Get ready to dance in just {{ daysToGo }} days!',
    ];

    public function render()
    {
        $message = Str::of($this->possibleMessages[array_rand($this->possibleMessages)])
            ->replace('{{ user.name }}', auth()->user()->name)
            ->replace('{{ daysToGo }}', round(Setting::getWeddingDate()->diffInDays(
                Carbon::now(),
                true
            )));

        return view('livewire.admin.dashboard', compact('message'));
    }
}
