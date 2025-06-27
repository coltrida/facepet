<div class="card-body h-100">
    <div class="tab-content py-0 mb-0 " style="height: 470px" id="chatTabsContent">
        @foreach($myFriends as $user)
            <!-- Conversation item START -->
            <div class="fade tab-pane show {{$loop->iteration == 1 ? 'active' : ''}} h-100" id="chat-{{$user->id}}" role="tabpanel" aria-labelledby="chat-{{$user->id}}-tab">
                <!-- Top avatar and status START -->
                <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="d-flex mb-2 mb-sm-0">
                        <div class="flex-shrink-0 avatar me-2">
                            <img class="avatar-img rounded-circle" src="{{$user->pathPhoto}}" alt="">
                        </div>
                        <div class="d-block flex-grow-1">
                            <h6 class="mb-0 mt-1">{{$user->username}}</h6>
                            <div class="small text-secondary">{{$user->type}}</div>
                        </div>
                    </div>
                </div>
                <!-- Top avatar and status END -->
                <hr>
                <!-- Chat conversation START -->
                <div class="chat-conversation-content custom-scrollbar">
                    <!-- Chat time -->
                    @if($user->combined_messages->first())
                        <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                    @endif
                    @foreach($user->combined_messages as $message)
                        @if ($loop->iteration > 1)
                            @if($user->combined_messages[($loop->iteration)-1]->created_at->format('Y-m-d') !==
                                   $user->combined_messages[($loop->iteration)-2]->created_at->format('Y-m-d'))
                                <div class="text-center small my-2">{{$message->created_at->format('Y-m-d')}}</div>
                            @endif
                        @endif
                        @if($message->sender_id !== auth()->id())
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="{{$message->sernder->pathPhoto}}" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">
                                                {{$message->body}}
                                            </div>
                                            <div class="small my-2">{{$message->created_at->format('h:i A')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                        @else
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">{{$message->body}}</div>
                                    </div>
                                    <div class="small my-2">{{$message->created_at->format('h:i A')}}</div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                        @endif
                    @endforeach
                </div>
                <!-- Chat conversation END -->
            </div>
            <!-- Conversation item END -->
        @endforeach
    </div>
</div>
