$(document).ready(function () {

  // var ctx = document.getElementById('progressChart').getContext('2d');

  const data = {
    labels: [
      'completed',
      'uncompleted'
    ],
    datasets: [{
      data: [30, 70],
      backgroundColor: [
        'rgb(54, 162, 235)',
        'rgba(54, 162, 235, 0.5)',
      ],
      cutout: '80%',
      borderWidth: 0,
    }]
  };
  
  const config = {
    type: 'doughnut',
    data: data,
    options: {
      cutoutPercentage: 80,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          enabled: false
        },
        title: {
          display: true,
          text: 'Center Text',
          position: 'bottom',
          font: {
            size: 20
          }
        }
      },
      elements: {
        arc: {
          borderRadius: 20
        }
      }
    }
  };
  
  // var progressChart = new Chart(ctx, config);


  //Dashboard Swiper
  var screenWidth = window.innerWidth;
  console.log(screenWidth);

  if ($(".dashboard-swiper").length > 0) {

    var t = new Swiper(".dashboard-swiper", 
    { 
      speed: 3e3, 
      slidesPerView: 2, 
      spaceBetween: 30, 
      parallax: !0, 
      centeredSlides: (screenWidth < 426) ? true : false,
      loop: !0, 
      autoplay: { delay: 8e3 }, 
      navigation: { nextEl: ".testimonial-next", prevEl: ".testimonial-prev" }, 
      breakpoints: { 
        1400: { slidesPerView: 4 }, 
        1300: { slidesPerView: 4 }, 
        768: { slidesPerView: 3 }, 
        576: { slidesPerView: 2 }, 
        320: { slidesPerView: 1 } 
      } 
    });

  }


  /********************************* DataTables ***************************************/
  //example 1
  var table = $('#example').DataTable({
    createdRow: function (row, data, index) {
      $(row).addClass('selected')
    },
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }
  });

  table.on('click', 'tbody tr', function () {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
      $row.removeClass('selected')
    } else {
      $row.addClass('selected')
    }
  })

  table.rows().every(function () {
    this.nodes().to$().removeClass('selected')
  });



  //example 2
  var table2 = $('#example2').DataTable({
    createdRow: function (row, data, index) {
      $(row).addClass('selected')
    },

    "scrollY": "42vh",
    "scrollCollapse": true,
    "paging": false
  });

  table2.on('click', 'tbody tr', function () {
    var $row = table2.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
      $row.removeClass('selected')
    } else {
      $row.addClass('selected')
    }
  })

  table2.rows().every(function () {
    this.nodes().to$().removeClass('selected')
  });

  // dataTable1
  var table = $('#dataTable1').DataTable({
    searching: false,
    paging: true,
    select: false,
    lengthChange: false,

  });
  // dataTable2
  var table = $('#dataTable2').DataTable({
    searching: false,
    paging: true,
    select: false,
    lengthChange: false,

  });
  // dataTable3
  var table = $('#dataTable3').DataTable({
    searching: false,
    paging: true,
    select: false,
    lengthChange: false,

  });
  // dataTable4
  var table = $('#dataTable4').DataTable({
    searching: true,
    paging: true,
    select: false
  });
  
  var table = $('#livelearn-table').DataTable({
    searching: true,
    paging: true,
    select: true,
    paging: true,
    info: true,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });



  // dataTable5
  var table = $('#example5').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: true,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });

  // dataTable6
  var table = $('#example6').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: false,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });

  // dataTable7
  var table = $('#example7').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: false,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });

  // dataTable8
  var table = $('#example8').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: false,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });
  // orderTable
  var table = $('#orderTable').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: false,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });



  // table row
  var table = $('#dataTable1, #dataTable2, #dataTable3, #dataTable4,  #example3, #example4 ').DataTable({
    select: true,
    searching: true,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }
  });
  $('#example tbody').on('click', 'tr', function () {
    var data = table.row(this).data();
  });



  /****************** Dropify *************************************/
  if ($('.dropify').length > 0) {
    $('.dropify').dropify({
      messages: {
        'default': 'Drag and drop your photos here',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong appended.'
      },
      error: {
        'fileSize': 'The file size is too big (2M max).'
      },
      tpl: {
        message: '<div class="dropify-message"><span class="file-icon" /> <p style="font-size: 18px!important; color: #000000; opacity: 0.7;"><b>{{ default }}</b></p><small style="font-size: 14px">Choose at least 5 photos</small><br> <span style="border-bottom: 1px solid; font-size: 14px; color: #000; margin-bottom: 5px;opacity: 0.7;">Upload from device</span></div>',

      }
    });
  }

  if ($('.dropify-id').length > 0) {
    $('.dropify-id').dropify({
      messages: {
        'default': 'Drag and drop your photos here',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong appended.'
      },
      error: {
        'fileSize': 'The file size is too big (2M max).'
      },
      tpl: {
        message: '<div class="dropify-message"><img src="../asset/img/front-of-id-card.png" class="img-fluid p-3 h-100" />  </span></div>',

      }
    });
  }



  /****************** Dropify *************************************/
  if ($('.sortable').length > 0) {
    $(".sortable").sortable({
      connectWith: '.sortable',
      items: '.card-draggable',
      revert: true,
      placeholder: 'card-draggable-placeholder',
      forcePlaceholderSize: true,
      opacity: 0.77,
      cursor: 'move'
    });
  }



  // Toggle Password Input Visibility

  $('.rlf-hd-hide').on('click', function () {
    let targetInput = $(this).parents('.rlf-hd').siblings('.psw_input');
    targetInput.attr('type', 'text');
    $(this).siblings('.rlf-hd-show').removeClass('d-none');
    $(this).addClass('d-none');

  });

  $('.rlf-hd-show').on('click', function () {
    let targetInput = $(this).parents('.rlf-hd').siblings('.psw_input');
    targetInput.attr('type', 'password');
    $(this).siblings('.rlf-hd-hide').removeClass('d-none');
    $(this).addClass('d-none');
  });


  //Sweet Alert for Deleting listing
  //Custom Image
  $('.td-btn-delete').click(function (event) {
    event.stopPropagation();
    swal({
      imageUrl: 'asset/img/icon-trash-red.png',
      title: "Delete Listing?",
      text: "You are about to delete this listing, know that the action cannot be reversed.",
      animation: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: 'Yes, delete',
      showLoaderOnConfirm: true,
      showCancelButton: true,
    }, function () {
      toastr.success("Listing successfully deleted.", "Success!", {
        timeOut: 5000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
      });
    });
  });


  //Sweet Alert for Deleting a user
  //Custom Image
  $('.btn-delete-user').click(function (event) {
    event.stopPropagation();
    swal({
      imageUrl: 'asset/img/icon-trash-red.png',
      title: "Delete User?",
      text: "You are about to delete this user, know that the action cannot be reversed.",
      animation: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: 'Yes, delete',
      showLoaderOnConfirm: true,
      showCancelButton: true,
    }, function () {
      toastr.success("User successfully deleted.", "Success!", {
        timeOut: 5000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
      });
    });
  });
  //Sweet Alert for banning a user
  //Custom Image
  $('.td-btn-ban').click(function (event) {
    event.stopPropagation();
    swal({
      imageUrl: 'asset/img/icon-minus-cirlce-red.png',
      title: "Ban User?",
      text: "You are about to ban this user, know that the action cannot be reversed.",
      animation: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: 'Yes, ban',
      showLoaderOnConfirm: true,
      showCancelButton: true,
    }, function () {
      toastr.success("User successfully banned.", "Success!", {
        timeOut: 5000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
      });
    });
  });

  //Sweet Alert for banning a user
  //Custom Image
  $('.td-btn-unban').click(function (event) {
    event.stopPropagation();
    swal({
      imageUrl: 'asset/img/icon-minus-cirlce-red.png',
      title: "Unban User?",
      text: "You are about to unban this user, know that the action cannot be reversed.",
      animation: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: 'Yes, unban',
      showLoaderOnConfirm: true,
      showCancelButton: true,
    }, function () {
      toastr.success("User successfully unbanned.", "Success!", {
        timeOut: 5000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
      });
    });
  });


  $('.td-btn-verify').on('click', function () {
    toastr.success("Payment successfully completed.", "Verified!", {
      timeOut: 5000,
      closeButton: !0,
      debug: !1,
      newestOnTop: !0,
      progressBar: !0,
      positionClass: "toast-top-right",
      preventDuplicates: !0,
      onclick: null,
      showDuration: "300",
      hideDuration: "1000",
      extendedTimeOut: "1000",
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      tapToDismiss: !1
    });
  });

  $('.td-btn-not-verify').on('click', function () {
    toastr.error("Payment not completed.", "Pending!", {
      timeOut: 5000,
      closeButton: !0,
      debug: !1,
      newestOnTop: !0,
      progressBar: !0,
      positionClass: "toast-top-right",
      preventDuplicates: !0,
      onclick: null,
      showDuration: "300",
      hideDuration: "1000",
      extendedTimeOut: "1000",
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      tapToDismiss: !1
    });
  });


  // TOASTR
  $("#toastr-success-top-right").on("click", function () {
    toastr.success("This Is Success Message", "Top Right", {
      timeOut: 500000000,
      closeButton: !0,
      debug: !1,
      newestOnTop: !0,
      progressBar: !0,
      positionClass: "toast-top-right",
      preventDuplicates: !0,
      onclick: null,
      showDuration: "300",
      hideDuration: "1000",
      extendedTimeOut: "1000",
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      tapToDismiss: !1
    });
  });



  var currentDate = moment().format('MM/DD/YYYY');

  $('.input-limit-datepicker').daterangepicker({
    format: 'MM/DD/YYYY',
    buttonClasses: ['btn', 'btn-sm'],
    applyClass: 'btn-success',
    cancelClass: 'btn-danger',
  });


});

