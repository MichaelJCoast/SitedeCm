@extends(backpack_view('blank'))

@php
    $postCount = App\Models\Post::count();
	if($postCount>0)
	{
		$lastPost = App\Models\Post::orderBy('created_at', 'DESC')->first();
    	$lastPostDaysAgo = \Carbon\Carbon::parse($lastPost->created_at)->diffInDays(\Carbon\Carbon::today());
	}
	else
	{
		$lastPostDaysAgo = 0;
	}


    $orderCount = App\Models\Order::where('status', '<', 3)->get();

    $widgets['after_content'][] = [
	  'type' => 'div',
	  'class' => 'row',
	  'content' => [ // widgets
	       [
			  'type' => 'card',
			  // 'wrapperClass' => 'col-sm-6 col-md-4', // optional
			  'class' => 'card bg-info text-white', // optional
			  'content' => [
			      'header' => 'Departamento de Tecnologia — 2022-2023', // optional
			      'body' => 'O NECM no mandato 2022-2023 criou este website de raiz com Laravel. Esperámos que seja utilizado durante vários anos. Como tal, caso surja algum problema, é favor contactar um dos desenvolvedores sendo estes, <b>Luís Peixoto</b>, <b>Marco Moreira</b> e <b>Simão Amaral.</b>',
			  ]
           ]
      ]
];

    Widget::add()->to('before_content')->type('div')->class('row')->content([
		// notice we use Widget::make() to add widgets as content (not in a group)
        Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-success')
			->value($postCount)
			->description('Posts efetuados!'),

            Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-primary')
			->value($lastPostDaysAgo . ' dias')
			->description('desde o último post'),

            Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-warning')
			->value(count($orderCount))
			->description('reservas pendentes'),
]);
@endphp

@section('content')
@endsection
