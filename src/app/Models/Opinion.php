<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'contacts_id',
        'fullname',
        'gender',
        'email',
        'opinion'
    ];

    protected $table = 'opinions';

    public function getDate() {
        $data = DB::table($this->table)->get();
        return $data;
    }

    public function contact() {
        return $this->belongsTo(Contact::class);
    }

    public function scopeCategorySearch($query, $contacts_id)
{
    if (!empty($contacts_id)) {
        $query->where('contact_id', $contacts_id);
    }
}

    public function scopeKeywordSearch($query, $keyword)
{
    if (!empty($keyword)) {
        $query->where('fullname', 'like', '%' . $keyword . '%');
    }
}

}
