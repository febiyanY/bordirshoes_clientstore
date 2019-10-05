@extends('layouts.user')

@section('pagetitle')
Sepatu Bordir.id | Index
@endsection

@section('content')

<div class="container bootstrap snippet">
  <div class="row">
    <div class="col-sm-10">
      <h1>Tagihan {{session('user')->username}}</h1><!-- </div> -->
      <!-- <div> -->
      <a style="text-decoration: none;" href="{{route('home.index')}}"><i class="glyphicon glyphicon-home"><strong>
            HOME</strong></i></a>
      <br />
      <br />
      <a style="text-decoration: none;" href="/logout"><i class="glyphicon glyphicon-log-out"><strong>
            LOGOUT</strong></i></a>
    </div>
    <div class="col-sm-2"><a href="{{route('userprofile.show')}}" class="pull-right"><img title="profile image"
          class="img-circle img-responsive"
          src="http://anecca.org/wp-content/uploads/2017/10/profile-blank-female.png"></a></div>
    <i class="fa fa-home"></i>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <!--left col-->

      <ul class="list-group">
        <li class="list-group-item text-muted">Profile</li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span>
          {{session('user')->username}}</li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span> <a
            style="text-decoration: none;" href="mailto: {{session('user')->email}}">{{session('user')->email}}</a></li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>User ID</strong></span>
          {{session('user')->id}}</li>

      </ul>
      <ul class="list-group">
        <li class="list-group-item text-right"><span class="pull-left"><strong>Do you want to change your Information
              ?</strong></span><a href="/profile/{{session('user')->id}}/edit"><button>Edit</button></a>
          <div class="expandable form-group text-center" style="margin-top:30px; width:100%" data-count="1">
          </div>
        </li>
      </ul>
      <ul class="list-group">
        <li class="list-group-item text-right">
          <div>
            <a type="button" class="btn btn-primary" href="{{route('userprofile.tagihan')}}" style="width: 100%">Tagihan 
              @if(count($data) > 0)
              ({{count($data)}})
              @endif
            </a>
          
          </div>
        </li>

      </ul>


    </div>
    <!--/col-3-->
    <div class="col-sm-9">

      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="" data-toggle="tab">My Tagihan<br />Total: {{count($data)}}</a></li>
        <!-- <li><a href="#messages" data-toggle="tab">Cronologia Appuntamenti</a></li>
            <li><a href="#settings" data-toggle="tab">Modifica utente</a></li> -->
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="home">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <!-- <th>Sisa Tagihan</th> -->
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody id="items">

                @foreach($data as $d)

                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
                  <td>{{$d->orderId}}</td>
                  <!-- <td>Rp.{{number_format($d->sisa, 2, '.', ',')}}</td> -->
                  
                  <td><a style="text-decoration: none;" href="{{route('userprofile.detailTagihan',['id'=>$d->orderId,'idTagihan'=>$d->customerId])}}">Detail <button
                        class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></a>
                  </td>
                </tr>

                @endforeach
                <tr>
                  <td colspan="12" class="hiddenRow">
                    <div class="accordian-body collapse" id="demo1">
                      <table class="table table-striped">
                        <h1>Dettagli trattamento</h1>

                        <tbody>
                          <tr id='addr0'>
                            <td>

                            </td>
                            <td>
                              <input type="text" name='name0' placeholder='Name' class="form-control" />
                            </td>
                            <td>
                              <input type="text" name='mail0' placeholder='Mail' class="form-control" />
                            </td>
                            <td>
                              <input type="text" name='mobile0' placeholder='Mobile' class="form-control" />
                            </td>
                          </tr>
                          <tr id='addr1'></tr>
                        </tbody>

                      </table>
                      <a id="add_row" class="btn btn-default pull-left">Aggiungi riga</a><a id='delete_row'
                        class="pull-right btn btn-default">Elimina riga</a>

                    </div>
                  </td>
                </tr>



              </tbody>

            </table>
            <hr>
            <div class="row">
              <div class="col-md-6 col-md-offset-4 text-center">
                <ul class="pagination" id="myPager"></ul>
              </div>
            </div>
          </div>
          <!--/table-resp-->

          <div id="edit" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4 class="modal-title">Modifica dati per (servizio)</h4>
                </div>
                <div class="modal-body">
                  <input id="fn" type="text" class="form-control" name="fname" placeholder="Prodotti utilizzati">
                  <input id="ln" type="text" class="form-control" name="fname" placeholder="Colori Utilizzati">
                  <input id="mn" type="text" class="form-control" name="fname" placeholder="Note">
                </div>
                <div class="modal-footer">
                  <button type="button" id="up" class="btn btn-success" data-dismiss="modal">Aggiorna</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Chiudi</button>
                </div>
              </div>
            </div>
          </div>

          <hr>

        </div>
        <!--/tab-pane-->
        <div class="tab-pane" id="messages">

          <h2></h2>

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Servizio</th>
                  <th>Modifica</th>
                </tr>
              </thead>
              <tbody id="items">
                <tr>
                  <td>10.05.2017</td>
                  <td>MASSAGGIO schiena</td>

                  <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1"
                      class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
                  </td>


                </tr>
              </tbody>
            </table>
          </div>

        </div>
        <!--/tab-pane-->
        <div class="tab-pane" id="settings">


          <hr>
          <form class="form" action="##" method="post" id="registrationForm">
            <div class="form-group">

              <div class="col-xs-6">
                <label for="first_name">
                  <h4>Nome</h4>
                </label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="nome"
                  title="Inserisci il nome">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="last_name">
                  <h4>Cognome</h4>
                </label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Cognome"
                  title="Inserisci il cognome">
              </div>
            </div>


            <div class="form-group">
              <div class="col-xs-6">
                <label for="mobile">
                  <h4>Telefono</h4>
                </label>
                <input type="text" class="form-control" name="mobile" id="mobile"
                  placeholder="inserisci il numero di telefono" title="inserisci il numero di telefono">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="email">
                  <h4>Email</h4>
                </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="tua@email.it"
                  title="Inserisci l'email">
              </div>
            </div>


            <div class="form-group">
              <div class="col-xs-12">
                <br>
                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                  Salva</button>
                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Ripristina</button>
              </div>
            </div>
          </form>
        </div>

      </div>
      <!--/tab-pane-->
    </div>
    <!--/tab-content-->

  </div>
  <!--/col-9-->
</div>
<!--/row-->
</hr>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function () {
    $(".expandable").on("click", ".add-more", function (e) {
      e.preventDefault();
      var rmButton = '<button class="btn btn-danger remove-me" type="button">-</button>';
      var grandParent = $(this).parent().parent();
      var countVal = grandParent.data("count");
      var count = parseInt(countVal);
      if (count == 1) {
        $(this).before(rmButton);
      }
      var toBeCopied = $(this).parent().clone();
      if (count == 1) {
        var curClass = toBeCopied.find("input").attr('class');
        toBeCopied.find("input:first").attr('class', curClass + " offset-md-3");
        toBeCopied.find("label").remove();

      }
      var add_button = $(this).detach();
      grandParent.append(toBeCopied);
      count++;
      grandParent.data("count", count);
    });
    $(".expandable").on("click", ".remove-me", function (e) {
      e.preventDefault();
      var grandParent = $(this).parent().parent();
      var countVal = grandParent.data("count");
      count = parseInt(countVal);
      count--;
      grandParent.data("count", count);

      var nextButton = $(this).next("button");
      var prevButton = $(this).parent().prev().find("button");

      //When we click remove on the last entry:
      if (/add-more/.test(nextButton.attr("class")) && /remove-me/.test(prevButton.attr("class"))) {
        var add_button = nextButton.detach();
        $(this).parent().prev().find(".remove-me").after(add_button);
      }
      //When we click on the first entry:
      if ($(this).parent().children().is("label")) {
        secondEntry = $(this).parent().next().find("input");
        secondEntry.removeClass("offset-md-3");
        secondEntry.before($(this).parent().find("label"));
      }
      if (count == 1) {
        $(this).parent().prev().find(".remove-me").remove();
        $(this).parent().next().find(".remove-me").remove();
      }
      $(this).parent().remove();
    });


  });




  $(document).ready(function () {
    var i = 1;
    $("#add_row").click(function () {
      $('#addr' + i).html("<td>" + (i + 1) + "</td><td><input name='name" + i +
        "' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail" + i +
        "' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile" + i +
        "' type='text' placeholder='Mobile'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
      i++;
    });
    $("#delete_row").click(function () {
      if (i > 1) {
        $("#addr" + (i - 1)).html('');
        i--;
      }
    });

  });
</script>
@endsection