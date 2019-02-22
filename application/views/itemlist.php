<!DOCTYPE html>
<html>
<head>
    <title>Testing Ajax Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Testing Ajax Post</h2>
        </div>
    </div>
</div>

<form action="">
<div class="row">
  <div class="col-lg-8">
    <strong>Nama :</strong>
    <input type="text" name="title" class="form-control" placeholder="Title">
  </div>
  <div class="col-lg-8">
    <strong>Nama Lengkap:</strong>
    <textarea name="description" class="form-control" placeholder="Description"></textarea>
  </div>
  <div class="col-lg-8">
    <br/>
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</div>
</form>

<table class="table table-bordered" style="margin-top:20px">


  <thead>
      <tr>
          <th>Nama </th>
          <th>Nama Lengkap</th>
      </tr>
  </thead>


  <tbody>
   <?php foreach ($data as $item) { ?>      
      <tr>
          <td><?php echo $item->title; ?></td>
          <td><?php echo $item->description; ?></td>
      </tr>
   <?php } ?>
  </tbody>


</table>
</div>


<script type="text/javascript">
    $('form').submit(function(e) {
        e.preventDefault();
       var title = $("input[name='title']").val();
       var description = $("textarea[name='description']").val();
        $.ajax({
           url: "http://35.196.230.120/ci_servertest/index.php/ItemController/ajaxRequestPost",
           type: 'POST',
           crossDomain: true,
           data: {title: title, description: description},
           error: function() {
             console.log(err);
              // alert('Something is wrong');
           },
           success: function(data) {
                $("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
                alert("Record added successfully");  
           }
        });
    });
</script>


</body>