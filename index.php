<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">
    <title>Nokia Importer</title>

  </head>
  <body>
     <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="index.php">Home</a></li>
            <li role="presentation"><a target="_blank" href="https://github.com/rajeshtomjoe/nokia-nbu-contact-importer">Fork me</a></li>
            <li role="presentation"><a target="_blank" href="https://github.com/rajeshtomjoe">About</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Nokia Contact Importer (.nbu)</h3>
      </div>

      <div class="jumbotron">
        <h2>Upload your .nbu contact backup file</h2>
        <p class="lead">A utility to parse the contacts from nokia's contact backup file formats <i>(*.nbu)</i>. This utility also helps you to sync the backed up contacts to your Google Contacts.</p>
        <p>
            <div class="file-upload">
              <a id="trigger-file" class="btn btn-lg btn-success" href="javascript:void(0);" role="button">
              Upload</a>
              <form id="nokia-form">
                <input type="file" name="file">
              </form>
            </div>
        </p>

        <small>Note: All contacts will be saved to Other contacts in your Google Account</small>
      </div>

      <div class="row contacts hide">
        <div class="col-lg-12">
          <div class="clearfix">
            <h2 class="pull-left" style="margin-top: 0;">Contacts</h2>
            <?php if(!isset($_SESSION['access_token'])):?>
              <a href="authorise-application.php" class="btn btn-success pull-right">Authorize Google</a>
            <?php else:?>
                <a id="sync" href="javascript:void(0);" class="btn btn-success pull-right">Sync to Google</a>
            <?php endif;?>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td>#</td>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Sync Status</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; <?php echo date('Y');?></p>
        <p>Browser support: E 10+, Firefox 4.0+, Chrome 7+, Safari 5+, Opera 12+</p>
      </footer>

    </div> <!-- /container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>