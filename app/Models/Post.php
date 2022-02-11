<?php

namespace App\Models;

use App\Models\User;
use DOMDocument;
use DOMXPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    private $max = 100;

    protected $fillable = [
        'photo_path',
        'user_id',
        'title',
        'content'
    ];

    use HasFactory;

    public static function prepare($data) {
        $data['content'] = strip_tags($data['content'], '<a><b><i><p><li><ul><ol>');

        $dom = new DOMDocument;
        $dom->loadHTML($data['content']);
        $xpath = new DOMXPath($dom);
        $nodes = $xpath->query('//@*');
        foreach ($nodes as $node) {
            if($node->nodeName !== 'href'){
                $node->parentNode->removeAttribute($node->nodeName);
            }
        }
        $data['content'] = strip_tags($dom->saveHTML(), '<a><b><i><p><li><ul><ol>');

        $data['photo_path'] = $data['photo']->storePublicly('photos');
        $data['user_id'] ??= Auth::id();
        return $data;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getExcerptAttribute() {
        if (strlen($this->content) <= $this->max)
            return $this->content;
        $ix = strrpos(substr($this->content, 0, $this->max-2), ' ');
        if ($ix===FALSE)
            $text = substr($this->content, 0, $this->max-3);
        else
            $text = substr($this->content, 0, $ix);
        return $text.'...';
    }
}
