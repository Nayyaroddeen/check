<!doctype html>

 @foreach ($name as $set)
   {{$set->id }}{!!$set->body !!}{!!link_to_route('post.edit','Edit',[$set->id],['class'=>'btn btn-success'])!!}
   {!!link_to_route('post.delete','Delete',[$set->id],['class'=>'btn btn-success'])!!}
<br/>
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59c6b34c48a443001140a7b3&product=inline-share-buttons"></script>
<div class="sharethis-inline-share-buttons"></div>
 @endforeach





