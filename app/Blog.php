<?php namespace App;
    use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
	protected $table = 'blog';
	protected $fillable = array('id', 'language','blog_title', 'name','category','title','meta','header1','header2','header3',
    'comment1','comment2','comment3','comment4','summary');

}
