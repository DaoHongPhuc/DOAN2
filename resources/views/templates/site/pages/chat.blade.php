@extends('templates.site.layouts.index')

@section('homecontent')

<link rel="stylesheet" href="site/css/chat.css">
<div class="container" style="margin-top: 100px;">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat" id="inbox_chat">
          </div>
        </div>

        <div class="mesgs">
          <div class="msg_history" id="msg_history">
            {{-- history message --}}
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
                  <input type="text" class="write_msg" name="contentMessage" 
                  placeholder="Type a message" id="contentMessage"/>
            {{-- <input type="hidden" id="currentuserid" value="{{}}"> --}}
                <button class="msg_send_btn" id="btnSendMessage"
                  type="button">
                  <i class="far fa-paper-plane" style="font-size: 15px;"></i> 
                  Send
                </button>
            </div>
          </div>
        </div>
      </div>
    </div></div>
</div>
@endsection

@section('homescript')
    <script>
      $(document).ready(function () {
        // lay toan bo danh ba
        initContact();

        // interval message
        let contactid = sessionStorage.getItem("contactid");
       
        if(contactid){
          initMessage(contactid);
          setInterval(function(){ 
            let contactid = sessionStorage.getItem("contactid");
            initMessage(contactid) 
            
            },             
            5000);
        }

        // chon user trong danh ba de lay message
        selectContact();

        // send
        $("#btnSendMessage").click(function (e) { 
          e.preventDefault();
          sendMessage()
        });
      });

      function selectContact(){
        $(document).on('click', '.chat_list', function(){
          contactid = $(this).data('contactid');
          sessionStorage.removeItem("contactid");
          sessionStorage.setItem("contactid",contactid);   
          initContact();
          // $(this).addClass( "active_chat" );

          initMessage(contactid);
          
        });
      }

      function initMessage(contactid){
        // var contactid = sessionStorage.getItem("contactid")
        var tmp = [];
        $.ajax({
          type: "get",
          url: "{{route('getmessage')}}",
          data: {
            id: contactid
          },
          dataType: "json",
          success: function (d) {
            $.each(d.chathistory, function (k, v) {   
              
              checkSeen = (v.seen = 1 ? "unseen" : "seen")
              if(v.from_id == '{{Auth::user()->id}}'){
                tmp.push('<div class="outgoing_msg my-2">'+
                    '<div class="sent_msg">'+
                      '<p>'+v.content+'</p>'+
                      '<span class="time_date">'+v.created_at+' <i class="far fa-trash-alt" onClick="deleteMessage('+v.id+')" title="Delete"></i> <span class="checkSeen">'+checkSeen+'</span></span> '+
                    '</div>'+
                  '</div>'
                );
              }else{
                tmp.push('<div class="incoming_msg my-2">'+
                  '<div class="incoming_msg_img"> '+
                    '<img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>'+
                    '<div class="received_msg">'+
                      '<div class="received_withd_msg">'+
                        '<p>'+v.content+'</p>'+
                        '<span class="time_date">'+v.created_at+' <i class="far fa-trash-alt" onClick="deleteMessage('+v.id+')" title="Delete"></i> </span>'+
                    '</div>'+
                  '</div>'+
                '</div>');
              }
            });
            $("#msg_history").html(tmp);
          }
        });
      }

      function initContact(){
        let contactid = sessionStorage.getItem("contactid");
        if(contactid){
          $.ajax({
            type: "get",
            url: "{{route('getcontact')}}",
            data: {
              selectContact:contactid
            },
            dataType: "json",
            success: function (d) {
              $("#inbox_chat").html(d.listcontact)
              // console.log(d.listcontact)
            }
          });
        }else{
            $.ajax({
            type: "get",
            url: "{{route('getcontact')}}",
            data: null,
            dataType: "json",
            success: function (d) {
              $("#inbox_chat").html(d.listcontact)
              // console.log(d.listcontact)
            }
          });
        }
        
      }

      function sendMessage(){
        contactid = sessionStorage.getItem("contactid");
        if(contactid){
          contentmessage = $("#contentMessage").val() 
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type: "post",
            url: "{{route('sendmessage')}}",
            data: {
              contactid: contactid,
              contentmessage: contentmessage
            },
            dataType: "json",
            success: function (d) {
              initMessage(contactid)
              $("#contentMessage").val("") 
            }
          });
        }
      }


      function deleteMessage(idMessage){
        let contactid = sessionStorage.getItem("contactid");
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure delete ?" ,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((confirmDelete) => {
              if (confirmDelete.value) {
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      type: "post",
                      url: "{{route('deleteMessage')}}",
                      data: {idMessage: idMessage},
                      dataType: "json",
                      success: function (d) {
                          if (d.status) {
                              Swal.fire('Successful !', '', 'success');
                              initMessage(contactid);
                          }else{
                              Swal.fire('Error !', '', 'error');                 
                          }
                          init();
                      }
                  });
              }else{
                  Swal.fire('Cancel !', '', 'error');
              }
        });
      }

      function deleteContact(idContact){
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure delete ?" ,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((confirmDelete) => {
              if (confirmDelete.value) {
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      type: "post",
                      url: "{{route('deleteContact')}}",
                      data: {idContact: idContact},
                      dataType: "json",
                      success: function (d) {
                          if (d.status) {
                              Swal.fire('Successful !', '', 'success');
                              sessionStorage.removeItem("contactid");
                              initContact();
                          }else{
                              Swal.fire('Error !', '', 'error');                 
                          }
                          init();
                      }
                  });
              }else{
                  Swal.fire('Cancel !', '', 'error');
              }
        });
      }
      
    </script>
@endsection
  

