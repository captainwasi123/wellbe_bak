<div class="card">
  <div class="card-header">
      <div class="row">
          <div class="col-sm-10 col-md-10 col-xs-10">
              @if($type == 'booker')
                <h5 class="mb-0 mt-0">
                 <img src="{{URL::to('/'.$data->practitioner->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">  <p>{{empty($data->practitioner->first_name) ? '' : $data->practitioner->first_name.' '.$data->practitioner->last_name}}</p>
                </h5>
              @else
                <h5 class="mb-0 mt-0">
                 <img src="{{URL::to('/'.$data->booker->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">  <p>{{empty($data->booker->first_name) ? '' : $data->booker->first_name.' '.$data->booker->last_name}}</p>
                </h5>
              @endif
          </div>
          <div class="col-sm-2 chat-options col-md-2 col-xs-2">
              <i class="far fa-window-minimize mr-2 mt-0" data-toggle="collapse" data-target="#chatContent"
                  aria-expanded="false" aria-controls="collapseOne" style="cursor: pointer;"></i>
          
          </div>
      </div>
  </div>
  <div id="chatContent" class="collapse show" aria-labelledby="headingOne">
      <div class="card-body p-0">
          <div class="messaging">
              <div class="inbox_msg">
                  <div class="mesgs">
                      <div class="msg_history inbox_chat" id="inbox_chat">

                          @foreach($conversation as $chat)
                            @if(Auth::id() == $chat->user_id)
                              <div class="outgoing_msg">
                                  <div class="sent_msg">
                                      <p>{{$chat->message}}</p>
                                      <span class="time_date">{{date('h:i A | d-M-Y', strtotime($chat->created_at))}}</span>
                                  </div>
                              </div>
                            @else  
                              <div class="incoming_msg">
                                  <div class="incoming_msg_img"> <img src="{{URL::to('/'.$chat->user->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';" alt="profile_img"> </div>
                                  <div class="received_msg">
                                      <div class="received_withd_msg">
                                          <p>{{$chat->message}}</p>
                                          <span class="time_date"> {{date('h:i A | d-M-Y', strtotime($chat->created_at))}}</span>
                                      </div>
                                  </div>
                              </div>
                            @endif
                          @endforeach
                          @if(count($conversation) == '0')
                            <div class="empty_chat">
                              <img src="{{URL::to('/public/assets/images/no-message.png')}}">
                              <h4>No Converstaion Found.</h4>
                            </div>
                          @endif
                      </div>
                      <div class="type_msg">
                        <input type="hidden" name="_token" id="chatToken" value="{{csrf_token()}}">
                        <input type="hidden" name="ref" id="chatRef" value="{{base64_encode(base64_encode($data->id))}}">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" id="chatMessage" name="message" placeholder="Type your message" required/>
                            <button class="msg_send_btn" id="send">
                              <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>