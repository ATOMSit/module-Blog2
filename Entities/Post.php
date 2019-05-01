<?php

namespace Modules\Blog\Entities;

use App\Media;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Greabock\Tentacles\EloquentTentacle;
use Spatie\Image\Manipulations;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends Model implements HasMedia
{
    use UsesTenantConnection, EloquentTentacle, HasTranslations, HasMediaTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog__posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'body', 'online', 'indexable', 'published_at', 'unpublished_at'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'author_type', 'author_id', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'null'
    ];

    /**
     * The attributes that should be translate for arrays.
     *
     * @var array
     */
    public $translatable = [
        'title',
        'slug',
        'body'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'body' => 'string',
        'online' => 'boolean',
        'indexable' => 'boolean',
        'author_type' => 'string',
        'author_id' => 'integer',
        'published_at' => 'datetime',
        'unpublished_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /*
     * Definition of collections for the media
     *
     * Return MediaCollection
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('cover')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_STRETCH, 250, 250);
            });
    }

    /**
     * Returns the User who is the author of this Post
     *
     * @return MorphTo
     */
    public function author(): MorphTo
    {
        return $this->morphTo();
    }
}
