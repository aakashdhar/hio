var categoryTable;
var subcategoryTable;
var blogtable;
var reviewtable;
var customertable;
var sptable;
var usertable;
var citytable;
var sreqtable;
var complainstable;
var feedbacktable;
var sracceptedtable;
var srcompletedtable;
var srcancelledtable;
var srongoingtable;
var coupontable;
var srpendingtable;
var carrertable;

$(document).ready(function() {

  categoryTable = $("#categoryTable").DataTable({
    "ajax": "showcategory.php",
    "order": []
  });

  subcategoryTable = $("#subcategoryTable").DataTable({
    "ajax": "showsubcategory.php",
    "order": []
  });

  blogtable = $("#blogtable").DataTable({
    "ajax": "showblog.php",
    "order": []
  });

  reviewtable = $("#reviewtable").DataTable({
    "ajax": "showreview.php",
    "order": []
  });

  customertable = $("#customertable").DataTable({
    "ajax": "showcustomer.php",
    "order": []
  });

  sptable = $("#sptable").DataTable({
    "ajax": "showservicepersonal.php",
    "order": []
  });

  usertable = $("#usertable").DataTable({
    "ajax": "showuser.php",
    "order": []
  });

  citytable = $("#citytable").DataTable({
    "ajax": "showcity.php",
    "order": []
  });

  sreqtable = $("#sreqtable").DataTable({
    "ajax": "showservicereq.php",
    "order": []
  });

  complainstable = $("#complainstable").DataTable({
    "ajax": "showcomplaints.php",
    "order": []
  });

  feedbacktable = $("#feedbacktable").DataTable({
    "ajax": "showfeedback.php",
    "order": []
  });

  sracceptedtable = $("#sracceptedtable").DataTable({
    "ajax": "showacceptedservicereq.php",
    "order": []
  });

  srcompletedtable = $("#srcompletedtable").DataTable({
    "ajax": "showcompletedservicereq.php",
    "order": []
  });

  srcancelledtable = $("#srcancelledtable").DataTable({
    "ajax": "showcancelledservicereq.php",
    "order": []
  });

  srongoingtable = $("#srongoingtable").DataTable({
    "ajax": "showongoingservicereq.php",
    "order": []
  });

  coupontable = $("#coupontable").DataTable({
    "ajax": "showcoupon.php",
    "order": []
  });

  srpendingtable = $("#srpendingtable").DataTable({
    "ajax": "showpendingservicereq.php",
    "order": []
  });

  carrertable = $("#carrertable").DataTable({
    "ajax": "showcarrer.php",
    "order": []
  });
});
