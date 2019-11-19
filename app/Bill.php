<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 */
class Bill extends Model
{
    /**
     *
     * @var array
     */
    protected $guarded = [];
    private $type_id;
    /**
     * @var int
     */
    private $status_id;

    /**
     * Get the type record associated with the bill.
     */
    public function type()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    /**
     * Get the type record associated with the bill.
     */
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('id', 'spend', 'paid');

        /*return $this->belongsToMany(User::class)->withPivot('spend', 'paid')->map(function ($value) {
            return $value->pivot->spend;
        })->sum();*/
    }

    public function shares()
    {
        return \DB::table('bills')
            ->select([
                'bills.*',
                'types.description as type',
                'statuses.description as status',
            ])
            ->selectRaw('SUM(bill_user.spend) AS amount')
            ->selectRaw('GROUP_CONCAT(users.name SEPARATOR ", ") as names')
            ->leftJoin('types', 'types.id', '=', 'bills.type_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'bills.status_id')
            ->leftJoin('bill_user', 'bill_user.bill_id', '=', 'bills.id')
            ->leftJoin('users', 'users.id', '=', 'bill_user.user_id')
            ->where('bills.status_id', 1)
            ->groupBy('bills.id')
            ->get();
    }

    public function opened()
    {
        return \DB::table('users')
            ->select(
                'name',
                \DB::raw('SUM(bill_user.spend) AS spend'),
                \DB::raw('SUM(bill_user.paid) AS paid'),
                \DB::raw('(SUM(bill_user.paid))-SUM(bill_user.spend) AS total')
            )
            ->leftJoin('bill_user', 'bill_user.user_id', '=', 'users.id')
            ->leftJoin('bills', 'bills.id', '=', 'bill_user.bill_id')
            ->where('bills.status_id', 1)
            ->groupBy('users.id')
            ->get();
    }

   /* public function opened()
    {
        return \DB::table('users')
            ->select(
                'name',
                \DB::raw('SUM(bill_user.spend) AS spend'),
                \DB::raw('SUM(bill_user.paid) AS paid'),
                \DB::raw('(SUM(bill_user.paid))-SUM(bill_user.spend) AS total')
            )
            ->leftJoin('bill_user', 'bill_user.user_id', '=', 'users.id')
            ->leftJoin('bills', 'bills.id', '=', 'bill_user.bill_id')
            ->where('bills.status_id', 1)
            ->groupBy('users.id')
            ->get();
    }*/
}
