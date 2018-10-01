<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CTsD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Check domain</h5>
                    <p class="card-text">Enter a word or group of words in each of the fields, then click the "Generate"</p>
                    <form method="post" action="process.php">
                        <div class="form-group">
                            <label>Field#1</label>
                            <input name="field1" type="text" class="form-control" placeholder="Enter a word(s)">
                        </div>
                        <div class="form-group">
                            <label>Field#2</label>
                            <input name="field2" type="text" class="form-control" placeholder="Enter a word(s)">
                        </div>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </form>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DNS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">WhoIs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">goDaddy</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <?php foreach ($resp[0] as $domain_name) { ?>
                        <li class="list-group-item"> <h3> <?php echo $domain_name; ?> </h3> </li>
                    <?php } ?>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <?php foreach ($resp[1] as $domain_name) { ?>
                        <li class="list-group-item"> <h3> <?php echo $domain_name; ?> </h3> </li>
                    <?php } ?>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <?php foreach ($resp[2] as $domain_name) { ?>
                        <li class="list-group-item"> <h3> <?php echo $domain_name; ?> </h3> </li>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>