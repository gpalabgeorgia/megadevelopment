$(document).ready(function () {
    // Check Admin Password is correct or not
    $("#current_pwd").keyup(function() {
       let current_pwd = $("#current_pwd").val();
       // alert(current_pwd);
       $.ajax({
          type: 'post',
          url: '/admin/check-current-pwd',
           data: {current_pwd:current_pwd},
           success: function (resp) {
                if(resp=="false") {
                    $("#chkCurrentPwd").html("<font color=red>მიმდინარე პაროლი არასწორია</font>");
                }else if(resp=="true") {
                    $("#chkCurrentPwd").html("<font color=green>მიმდინარე პაროლი სწორია</font>");
                }
           },error: function () {
                alert("Error");
           }
       });
    });

    $(".updateSectionStatus").click(function(){
       let status = $(this).text();
       let section_id = $(this).attr("section_id");
        $.ajax({
           type: 'post',
            url: '/admin/update-section-status',
            data: {status:status, section_id:section_id},
            success: function(resp) {
                if(resp['status']==0) {
                    $("#section-"+section_id).html('<a class="updateSectionStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#section-"+section_id).html('<a class="updateSectionStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
               alert("Error");
            }
        });
    });

    $(".updateBannerStatus").click(function(){
        let status = $(this).text();
        let banner_id = $(this).attr("banner_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-banner-status',
            data: {status:status, banner_id:banner_id},
            success: function(resp) {
                if(resp['status']==0) {
                    $("#banner-"+banner_id).html('<a class="updateBannerStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#banner-"+banner_id).html('<a class="updateBannerStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    $(".updateBlogBannerStatus").click(function(){
        let status = $(this).text();
        let blogBanner_id = $(this).attr("blogBanner_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-blogBanner-status',
            data: {status:status, blogBanner_id:blogBanner_id},
            success: function(resp) {
                if(resp['status']==0) {
                    $("#blogBanner-"+blogBanner_id).html('<a class="updateBlogBannerStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#blogBanner-"+blogBanner_id).html('<a class="updateBlogBannerStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Main Page Our Projects status
    $(".updateOurProjectsStatus").click(function(){
        let status = $(this).text();
        let ourProjects_id = $(this).attr("ourProjects_id");
        // alert(ourProjects_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-ourProjects-status',
            data: {status:status, ourProjects_id:ourProjects_id},
            success: function(resp) {
                if(resp['status']==0) {
                    $("#ourProjects-"+ourProjects_id).html('<a class="updateOurProjectsStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#ourProjects-"+ourProjects_id).html('<a class="updateOurProjectsStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Our Projects Sliders status
    $(".updateOurProjectsSliderStatus").click(function(){
        let status = $(this).text();
        let ourProjectsSlider_id = $(this).attr("ourProjectsSlider_id");
        // alert(ourProjects_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-ourProjectsSlider-status',
            data: {status:status, ourProjectsSlider_id:ourProjectsSlider_id},
            success: function(resp) {
                if(resp['status']==0) {
                    $("#ourProjectsSlider-"+ourProjectsSlider_id).html('<a class="updateOurProjectsSliderStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#ourProjectsSlider-"+ourProjectsSlider_id).html('<a class="updateOurProjectsSliderStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Videos status
    $(".updateVideoStatus").click(function(){
        let status = $(this).text();
        let ourVideo_id = $(this).attr("ourVideo_id");
        // alert(ourVideo_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-video-status',
            data: {status:status, ourVideo_id:ourVideo_id},
            success: function(resp) {
                // alert(ourVideo_id);
                if(resp['status']==0) {
                    $("#ourVideo-"+ourVideo_id).html('<a class="updateVideoStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#ourVideo-"+ourVideo_id).html('<a class="updateVideoStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Special status
    $(".updateSpecialStatus").click(function(){
        let status = $(this).text();
        let special_id = $(this).attr("special_id");
        // alert(ourVideo_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-special-status',
            data: {status:status, special_id:special_id},
            success: function(resp) {
                // alert(ourVideo_id);
                if(resp['status']==0) {
                    $("#special-"+special_id).html('<a class="updateSpecialStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#special-"+special_id).html('<a class="updateSpecialStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Second Banner status
    $(".updateSecondBannerStatus").click(function(){
        let status = $(this).text();
        let secondBanner_id = $(this).attr("secondBanner_id");
        // alert(ourVideo_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-secondBanner-status',
            data: {status:status, secondBanner_id:secondBanner_id},
            success: function(resp) {
                // alert(ourVideo_id);
                if(resp['status']==0) {
                    $("#secondBanner-"+secondBanner_id).html('<a class="updateSecondBannerStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#secondBanner-"+secondBanner_id).html('<a class="updateSecondBannerStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update About Slider status
    $(".updateAboutSliderStatus").click(function(){
        let status = $(this).text();
        let aboutSlider_id = $(this).attr("aboutSlider_id");
        // alert(ourVideo_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-aboutSlider-status',
            data: {status:status, aboutSlider_id:aboutSlider_id},
            success: function(resp) {
                // alert(ourVideo_id);
                if(resp['status']==0) {
                    $("#aboutSlider-"+aboutSlider_id).html('<a class="updateAboutSliderStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#aboutSlider-"+aboutSlider_id).html('<a class="updateAboutSliderStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Staf status
    $(".updateStaStatus").click(function(){
        let status = $(this).text();
        let sta_id = $(this).attr("sta_id");
        // alert(sta_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-sta-status',
            data: {status:status, sta_id:sta_id},
            success: function(resp) {
                // alert(sta_id);
                if(resp['status']==0) {
                    $("#staf-"+sta_id).html('<a class="updateStaStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#staf-"+sta_id).html('<a class="updateStaStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Motto status
    $(".updateMottoStatus").click(function(){
        let status = $(this).text();
        let motto_id = $(this).attr("motto_id");
        // alert(motto_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-motto-status',
            data: {status:status, motto_id:motto_id},
            success: function(resp) {
                // alert(sta_id);
                if(resp['status']==0) {
                    $("#motto-"+motto_id).html('<a class="updateMottoStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#motto-"+motto_id).html('<a class="updateMottoStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Blog status
    $(".updateBlogStatus").click(function(){
        let status = $(this).text();
        let blog_id = $(this).attr("blog_id");
        // alert(blog_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-blog-status',
            data: {status:status, blog_id:blog_id},
            success: function(resp) {
                // alert(sta_id);
                if(resp['status']==0) {
                    $("#blog-"+blog_id).html('<a class="updateBlogStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#blog-"+blog_id).html('<a class="updateBlogStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Blog status
    $(".updateContactBannerStatus").click(function(){
        let status = $(this).text();
        let contactBanner_id = $(this).attr("contactBanner_id");
        // alert(blog_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-contactBanner-status',
            data: {status:status, contactBanner_id:contactBanner_id},
            success: function(resp) {
                // alert(sta_id);
                if(resp['status']==0) {
                    $("#contactBanner-"+contactBanner_id).html('<a class="updateContactBannerStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#contactBanner-"+contactBanner_id).html('<a class="updateContactBannerStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Contact Block status
    $(".updateContactBlockStatus").click(function(){
        let status = $(this).text();
        let contactBlock_id = $(this).attr("contactBlock_id");
        // alert(blog_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-contactBlock-status',
            data: {status:status, contactBlock_id:contactBlock_id},
            success: function(resp) {
                // alert(sta_id);
                if(resp['status']==0) {
                    $("#contactBlock-"+contactBlock_id).html('<a class="updateContactBlockStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#contactBlock-"+contactBlock_id).html('<a class="updateContactBlockStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Update Contact Block status
    $(".updateOurProjectsBannerStatus").click(function(){
        let status = $(this).text();
        let ourProjectsBanner_id = $(this).attr("ourProjectsBanner_id");
        // alert(blog_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-ourProjectsBanner-status',
            data: {status:status, ourProjectsBanner_id:ourProjectsBanner_id},
            success: function(resp) {
                // alert(sta_id);
                if(resp['status']==0) {
                    $("#ourProjectsBanner-"+ourProjectsBanner_id).html('<a class="updateOurProjectsBannerStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#ourProjectsBanner-"+ourProjectsBanner_id).html('<a class="updateOurProjectsBannerStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });
    // Update Contact Block status
    $(".updateOurProjectsBlocksStatus").click(function(){
        let status = $(this).text();
        let ourProjectsBlocks_id = $(this).attr("ourProjectsBlocks_id");
        // alert(blog_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-ourProjectsBlocks-status',
            data: {status:status, ourProjectsBlocks_id:ourProjectsBlocks_id},
            success: function(resp) {
                // alert(sta_id);
                if(resp['status']==0) {
                    $("#updateOurProjectsBlocksStatus-"+ourProjectsBlocks_id).html('<a class="updateOurProjectsBlocksStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#updateOurProjectsBlocksStatus-"+ourProjectsBlocks_id).html('<a class="updateOurProjectsBlocksStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });
    // Update Project Filter status
    $(".updateProjectFilterStatus").click(function(){
        let status = $(this).text();
        let projectFilter_id = $(this).attr("projectFilter_id");
        // alert(blog_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-projectFilter-status',
            data: {status:status, projectFilter_id:projectFilter_id},
            success: function(resp) {
                // alert(sta_id);
                if(resp['status']==0) {
                    $("#updateProjectFilterStatus-"+projectFilter_id).html('<a class="updateProjectFilterStatus" href="javascript:void(0)">Inactive</a>');
                } else if(resp['status']==1) {
                    $("#updateProjectFilterStatus-"+projectFilter_id).html('<a class="updateProjectFilterStatus" href="javascript:void(0)">Active</a>');
                }
            },error:function() {
                alert("Error");
            }
        });
    });

    // Confirm Deletion with SwitAlert
    $(document).on("click",".confirmDelete",function() {
        let record = $(this).attr("record");
        let recordid= $(this).attr("recordid");
        Swal.fire({
           title: "გსურთ წაშლა?",
            text: "წაშლილ ფაილს ვეღარ აღადგენთ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'დიახ, წაშალე!'
        }).then((result) => {
            if(result.value) {
                window.location.href="/admin/delete-"+record+"/"+recordid;
            }
        });
    });
});
