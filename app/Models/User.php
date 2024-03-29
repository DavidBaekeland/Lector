<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Database\Seeders\DashboardSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const YEARS = ["1Ba", "2Ba", "3Ba", "1Ma", "2Ma", "1HBO5", "2HBO5", "1BaNaBa", "2BaNaBa", "1MaNaMa", "2MaNaMa"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'course_id',
        'year'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token): void
    {
        $url = url('/reset-password/'.$token.'/'.$this->email);

        $this->notify(new ResetPasswordNotification($url, $this->first_name));
    }

    /** Attibutes */
    public function getNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    public function hasChat($chat) {
        return $this->chats()->where('chat_id', $chat)->exists();
    }

    public function hasTaskSubmitted($task) {
        return $this->tasks()->where('task_id', $task)->exists();
    }

    public function hasTask($task) {
        return $this->course->subjects()->where('subject_id', Task::find($task)->pluck("subject_id")->first())->exists();
    }

    public function hasDashboard($dashboard) {
        return $this->dashboard()->where('dashboard_id', $dashboard)->exists();
    }

    public function hasDashboardTitle($dashboard) {
        return $this->dashboard->contains('title', $dashboard);
    }

    public function latestChat()
    {
        return $this->belongsToMany(Chat::class)->latest("updated_at")->first();
    }

    /** Relationships */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(Appointment::class);
    }

    public function appointmentsPersonal(): BelongsToMany
    {
        return $this->belongsToMany(Appointment::class)
            ->where("start_date", ">=", now());
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }

    public function dashboard(): BelongsToMany
    {
        return $this->belongsToMany(Dashboard::class);
    }
}
