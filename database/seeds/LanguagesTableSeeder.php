<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
{

    protected $language_codes = [
        'aa'=>'Afaraf',
        'af'=>'Afrikaans',
        'ak'=>'Akan',
        'sq'=>'Shqip',
        'ae'=>'avesta',
        'ay'=>'aymar aru',
        'bm'=>'bamanankan',
        'bi'=>'Bislama',
        'bs'=>'bosanski jezik',
        'br'=>'brezhoneg',
        'ch'=>'Chamoru',
        'kw'=>'Kernewek',
        'hr'=>'hrvatski jezik',
        'da'=>'dansk',
        'en'=>'English',
        'eo'=>'Esperanto',
        'fo'=>'føroyskt',
        'fj'=>'vosa Vakaviti',
        'gl'=>'galego',
        'de'=>'Deutsch',
        'hz'=>'Otjiherero',
        'ho'=>'Hiri Motu',
        'hu'=>'magyar',
        'ia'=>'Interlingua',
        'id'=>'Bahasa Indonesia',
        'ga'=>'Gaeilge',
        'io'=>'Ido',
        'it'=>'italiano',
        'kr'=>'Kanuri',
        'rw'=>'Ikinyarwanda',
        'kg'=>'Kikongo',
        'kj'=>'Kuanyama',
        'lg'=>'Luganda',
        'li'=>'Limburgs',
        'lu'=>'Tshiluba',
        'mg'=>'fiteny malagasy',
        'mt'=>'Malti',
        'na'=>'Dorerin Naoero',
        'nd'=>'isiNdebele',
        'ng'=>'Owambo',
        'nb'=>'Norsk bokmål',
        'nn'=>'Norsk nynorsk',
        'no'=>'Norsk',
        'nr'=>'isiNdebele',
        'om'=>'Afaan Oromoo',
        'rm'=>'rumantsch grischun',
        'rn'=>'Ikirundi',
        'sc'=>'sardu',
        'sm'=>'gagana fa\'a Samoa',
        'sn'=>'chiShona',
        'st'=>'Sesotho',
        'su'=>'Basa Sunda',
        'sw'=>'Kiswahili',
        'ss'=>'SiSwati',
        'sv'=>'svenska',
        'tl'=>'Wikang Tagalog',
        'tn'=>'Setswana',
        'to'=>'faka Tonga',
        'ts'=>'Xitsonga',
        'tw'=>'Twi',
        'ty'=>'Reo Tahiti',
        'wa'=>'walon',
        'cy'=>'Cymraeg',
        'wo'=>'Wollof',
        'fy'=>'Frysk',
        'xh'=>'isiXhosa',
        'zu'=>'isiZulu',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->language_codes as $code=>$language) {
            Language::create([
                'code'=>$code,
                'name'=>$language,
            ]);
        }
    }
}
