@php
    $all = $items;
   $pages = [];
    if ($all->lastPage() > 4) {
      $startPage = $all->currentPage();
      if ($startPage + 1 == $all->lastPage() || $startPage == $all->lastPage()) {
        $startPage = 1;
      } else if ($startPage + 2 == $all->lastPage()) {
        $startPage = $startPage - 1;
      }
      $endPage = $startPage +1;
      // if ($startPage)
      for ($i =$startPage; $i <= ($endPage) ; $i++) { 
        $pages[] = $i;
      }
      for ($j = ($all->lastPage() - 1); $j <= $all->lastPage(); $j++) { 
      $pages[] = $j;
      }

    }  else {
      for ($k =1; $k <= $all->lastPage() ; $k++) { 
        $pages[] = $k;
      }
    }
    // print_r($pages);
@endphp

@if(!empty($items->firstItem()))
<div class="row">
    <div class="col-sm-6">
      Showing items {{$items->firstItem()}} to {{$items->lastItem()}} out of {{$items->total()}}
    </div>
    <div class="col-sm-6">
      <div class="pull-right">
        {{-- {{$items->onEachSide(1)->links()}} --}}
        <ul class="pagination">
          @if($items->currentPage() > 1)
          <li><a href="javascript:;" data-ajax-url="{{$index_route}}?page={{$items->currentPage() - 1}}"><i class='fa fa-angle-double-left'></i> prev</a></li>
          @else
          <li class="disabled"><a href="javascript:;"><i class='fa fa-angle-double-left'></i> prev</a></li>
          @endif
          @foreach($pages as $key=>$page)
            @if($items->currentPage() == $page) 
            <li class="active hidden-xs"><a href="javascript:;">{{$page}}</a></li>
            @else
            <li class="hidden-xs"><a href="javascript:;" data-ajax-url="{{$index_route}}?page={{$page}}">{{$page}}</a></li>
            @endif
            @if($pages[$key] != $items->lastPage() && ($pages[$key+1] - $pages[$key]) > 1 )
            <li><a href="">...</a></li>
            @endif
          @endforeach
          @if($items->currentPage() < $items->lastPage())
          <li><a href="javascript:;" data-ajax-url="{{$index_route}}?page={{$items->currentPage() + 1}}">next <i class='fa fa-angle-double-right'></i></a></li>
          @else
          <li class="disabled"><a href="javascript:;">next <i class='fa fa-angle-double-right'></i></a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>
@endif