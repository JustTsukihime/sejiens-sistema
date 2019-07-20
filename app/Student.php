<?php

namespace App;

use Carbon\Carbon;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use JeroenDesloovere\VCard\VCard;

class Student extends Model
{
    use Filterable;

    protected $dates = ['applied_at', 'deleted_at', 'confirmed_at'];

    protected $guarded = ['created_at', 'updated_at'];

    public function emails() {
        return $this->hasMany(StudentEmails::class);
    }

    public function groups() {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    public function confirm()
    {
        $this->confirmed_at = Carbon::now();
        $this->save();
        return $this;
    }

    public function scopeConfirmed(Builder $query)
    {
        return $query->whereNotNull('confirmed_at');
    }

    public function scopeWhatsapp(Builder $query)
    {
        return $query->where('whatsapp', 'yes');
    }

    /**
     * @return VCard
     */
    public function getVCard() {
        $vcard = new VCard();

        $vcard->addName($this->surname, $this->name);
        $vcard->addEmail($this->email, 'HOME');
        $vcard->addPhoneNumber($this->phone, 'CELL');

        return $vcard;
    }

    public function getVCardQR() {
        $qropt = new QROptions([
            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
            'eccLevel'   => QRCode::ECC_L,
            'addQuietzone' => false,
            'cssClass' => 'card-img',
        ]);

        $qrcode = new QRCode($qropt);

        return base64_encode($qrcode->render($this->getVCard()->buildVCard()));
    }
}
