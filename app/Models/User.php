<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\MailResetPasswordNotification;
use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Models\Audit;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $stripe_id
 * @property string|null $pm_type
 * @property string|null $pm_last_four
 * @property string|null $trial_ends_at
 * @property-read Collection<int, Audit> $audits
 * @property-read int|null $audits_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder|User hasExpiredGenericTrial()
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User onGenericTrial()
 * @method static Builder|User orWhereHasPermission(array|string $permission = '', ?mixed $team = null)
 * @method static Builder|User orWhereHasRole(array|string $role = '', ?mixed $team = null)
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereDoesntHavePermissions()
 * @method static Builder|User whereDoesntHaveRoles()
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereHasPermission(array|string $permission = '', ?mixed $team = null, string $boolean = 'and')
 * @method static Builder|User whereHasRole(array|string $role = '', ?mixed $team = null, string $boolean = 'and')
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePmLastFour($value)
 * @method static Builder|User wherePmType($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStripeId($value)
 * @method static Builder|User whereTrialEndsAt($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @property string $status
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $country
 * @property string|null $currency
 * @method static Builder|User whereAddress($value)
 * @method static Builder|User whereCity($value)
 * @method static Builder|User whereCountry($value)
 * @method static Builder|User whereCurrency($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereState($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereZip($value)
 * @property string $first_name
 * @property string $last_name
 * @property-read string $balance
 * @property-read int $balance_int
 * @property-read Collection<int, Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereLastName($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements LaratrustUser, Auditable
{
    use HasWallet, Billable, HasApiTokens, HasFactory, Notifiable, HasRolesAndPermissions, \OwenIt\Auditing\Auditable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token));
    }

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
        'job_title',
        'job_description',
        'industry',
        'industry_description',
        'client_ip',
        'remain_count',
        'client_id',
        'role_id',
        'google_id'
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

    public function subscribePlan(Plan $plan, $id) {
        if($plan->plan_interval == "month") {
            $end_at = Carbon::now()->addMonth();
        } else {
            $end_at = Carbon::now()->addYear();
        }
        \App\Models\Subscription::create([
           "user_id" => $this->id,
           "plan_id" => $plan->id,
            "name" => $plan->name,
            "trial_ends_at" => Carbon::now()->addDays($plan->trial_period_days),
            "stripe_status" => "Success",
            "stripe_id" => $id,
            "stripe_price" => $plan->amount,
            "ends_at" => $end_at
        ]);
        if(is_object($this->guest) && isset($this->guest->id)) {
            $this->guest->update([
               'remain_count' => $plan->limit_words
            ]);
        }
    }

    public function subscriptions()
    {
        return $this->hasMany(\App\Models\Subscription::class, 'user_id');
    }

    public function lastSubscription()
    {
        return $this->hasOne(\App\Models\Subscription::class, 'user_id')->orderBy('id', 'desc')->whereDate('ends_at', '>=', Carbon::now())->first();
    }

    public function latestSubscription() {
        return $this->hasOne(\App\Models\Subscription::class, 'user_id')->whereDate('ends_at', '>=', Carbon::now())->latestOfMany();
    }

    public function lastPlan()
    {
        return $this->hasOne(Subscription::class, 'user_id')->orderBy('id', 'desc')->first();
    }

    public function guest()
    {
        return $this->hasOne(Guest::class, 'user_id');
    }

    public function user_industry()
    {
        return $this->belongsTo(Industry::class, 'industry', 'id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_title', 'id');
    }

    /**
     * @return HasMany
     */
    public function userTone(): HasMany
    {
        return $this->hasMany(UserTone::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function userIntention(): HasMany
    {
        return $this->hasMany(UserIntention::class, 'user_id', 'id');
    }

    /**
     * @return $this|false
     */
    public function isAdmin(): bool|static
    {
        if($this->hasRole('admin') || $this->hasRole('super_admin')){
            return $this;
        }
        return false;

    }
}
