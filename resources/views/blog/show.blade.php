@extends('layouts.master')

@section('content')
                            <!-- Posts
							============================================= -->
							<div id="posts" class="row grid-container gutter-30">
								<div class="entry col-12">
									<div class="single-post mb-0">
										<div class="entry-title">
											<h1 style="text-align:center">{{$data["post"]->title}}</h1>
										</div>
										<div class="entry-meta">
											<ul>
                                                {{-- <li><i class="icon-calendar3"></i>{{\Carbon\Carbon::parse($data['post']->created_at)->diffForHumans()}}</li> --}}
                                                <li><i class="icon-calendar3"></i>{{\Carbon\Carbon::parse($data['post']->created_at)->format('m/d/Y')}}</li>
												<li><a href="#"><i class="icon-user"></i>{{$data['post']->user->name}}</a></li>
												<li><i class="icon-folder-open"></i> <a href="tag/{{$data['post']->tags[0]->slug}}">{{$data['post']->tags[0]->name}}</a></li>
												<li><i class="icon-bookmark"></i>{{$data['post']->readtime}}</li>
                                            </ul>
                                        </div>

                                        <div class="entry-image bottommargin">
                                            <a href="#"><img src="images/blog/full/10.jpg" alt="Blog Single"></a>
                                        </div><!-- .entry-image end -->

                                        <div  class="entry-content mt-0">
                                            <p style="text-laign:center"><?php echo $data["post"]->body ?></p>
                                        </div>
									</div>
								</div>
							</div><!-- #posts end -->

@endsection