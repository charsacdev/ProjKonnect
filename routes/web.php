<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PaymentCheck;
use App\Http\Controllers\courseprogress;
use App\Http\Controllers\googleAuth;
use App\Http\Controllers\CreateProject;
use App\Http\Controllers\DashboardHeaderStudents;
use App\Http\Controllers\Cart;
use App\Livewire\CreateCredShowStep4;
use App\Livewire\LivesSessionMeetingGeneral;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
#Create Project
Route::get('/create-project', [CreateProject::class,'createProject']);

#=====================HOME PAGES ROUTES===================#
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/', function () {
    return view('homepages.home');
});

Route::get('/aboutus', function () {
    return view('homepages.about');
});

Route::get('/contact', function () {
    return view('homepages.contact');
});

Route::get('/blog', function () {
    return view('homepages.blog');
});

Route::get('/blogpost/{id}/{title}', function () {
    return view('homepages.blog-single');
});

Route::get('/pricing', function () {
    return view('homepages.pricing');
});

Route::get('/faq', function () {
    return view('homepages.faq');
});
Route::get('/terms', function () {
    return view('homepages.terms');
});

Route::get('/privacy', function () {
    return view('homepages.privacy');
});



#================GOOGLE AUTHENTICATION===================#
Route::get('/login/google', [googleAuth::class,'redirectToGoogle']);
Route::get('/google/callback', [googleAuth::class,'handleGoogleCallback']);


#========ACCOUNT AUTHENTICATION============#

Route::get('/register', function () {
    return view('students.register');
});

Route::get('/register/ref/{id}', function () {
    return view('students.register');
});

Route::get('/register/2/{id}', function () {
    return view('students.register2');
});

Route::get('/login', function () {
    return view('students.login');
});

Route::get('/verify-email/{email}', function () {
    return view('students.emailverification');
});

Route::get('/verify-email-success/{email}', function () {
    return view('students.verify-email-success');
});

Route::get('/forgotpassword', function () {
    return view('students.forgotpassword');
});

Route::get('/newpassword/{email}/{verify_time}', function () {
    return view('students.newpassword');
});

Route::get('/passwordsuccess', function () {
    return view('students.passwordsuccess');
});


#========EXTERNAL LINKS (CREDSHOW AND PTICH)===============#
Route::get('/credshow/{id}', function () {
    return view('students.externalcreadshow');
});

Route::get('/student-pitch-url/{id}/{email}', function () {
    return view('students.externalpitch');
});

#========LIVE SESSION===========#
Route::get('/ongoinglivelearn/{id}',[LivesSessionMeetingGeneral::class, 'mount'])->middleware('auth_check');




#==========DASHBOARD STUDENT=========#
Route::middleware(['auth_check','student_auth'])->group(function () {

        #search course
        Route::get('/search-courses', [DashboardHeaderStudents::class, 'search'])->name('search.courses');
        Route::get('/getpoints', [DashboardHeaderStudents::class, 'getPoints']);

        #Notifications
        Route::get('/notification-student', [DashboardHeaderStudents::class, 'Notifications']);

        Route::get('/dashboard', function () {
            return view('students.dashboard');
        });

        Route::get('/course', function () {
            return view('students.course');
        });

        Route::get('/course-preview/{course_id}', function () {
            return view('students.course-preview');
        });

        Route::get('/course-learn/{course_id}/{chapter_id}', function () {
            return view('students.course-preview');
        });

        Route::get('/cart', function () {
            return view('students.cart');
        });

        #cart management
        Route::get('/cartcount', [Cart::class,'CountCart']);
        Route::get('/cart-total', [Cart::class,'CartTotal']);

        Route::get('/quiz', function () {
            return view('students.quiz');
        });

        Route::get('/assignment', function () {
            return view('students.assignment');
        });

        Route::get('/student-courses', function () {
            return view('students.student-courses');
        });

        Route::get('/message-chat', function () {
            return view('students.messagechat');
        });

        Route::get('/message-chat/{id}', function () {
            return view('students.messagechat');
        });

        Route::get('/livelearn', function () {
            return view('students.livelearn');
        });

        // Route::get('/ongoinglivelearn/{id}', function () {
        //     return view('students.ongoinglivelearn');
        // });

        Route::get('/registerlivelearn/{id}', function () {
            return view('students.registerlivelearn');
        });

        #====DASHBOARD CRED SHOW=====#
        Route::get('/create-cred-show', function () {
            return view('students.create-cred-show');
        });

        Route::get('/create-cred-show-step1', function () {
            return view('students.create-cred-show-step1');
        });

        Route::get('/create-cred-show-step2', function () {
            return view('students.create-cred-show-step2');
        });

        Route::get('/create-cred-show-step3', function () {
            return view('students.create-cred-show-step3');
        });

        Route::get('/create-cred-show-step4', function () {
            return view('students.create-cred-show-step4');
        });

        #Save File Name of Pitch
        Route::post('/save-file-name', [CreateCredShowStep4::class, 'Credshow4']);

        Route::get('/create-cred-show-final', function () {
            return view('students.create-cred-show-final');
        });

        Route::get('/student-forum', function () {
            return view('students.student-forum');
        });

        Route::get('/student-forum/{id}', function () {
            return view('students.student-forum');
        });

        Route::get('/student-schedule', function () {
            return view('students.student-schedule');
        });

        Route::get('/student-profile', function () {
            return view('students.student-profile');
        });

        Route::get('/student-notifications', function () {
            return view('students.student-notification');
        });

        Route::get('/student-referal', function () {
            return view('students.student-referal');
        });

        #Handling AI Student
        Route::get('/student-ai', function () {
            return view('students.projkonnectai');
        })->middleware('plan_check');

        Route::get('/student-ai/{id}', function () {
            return view('students.projkonnectai');
        })->middleware('plan_check');

        Route::get('/student-certificate', function () {
            return view('students.student-certificate');
        });

        Route::get('/student-helpcenter', function () {
            return view('students.student-helpcenter');
        });



        #====DASHBOARD PITCH====#
        Route::get('/student-pitch', function () {
            return view('students.student-pitch');
        });

        Route::get('/student-create-pitch', function () {
            return view('students.student-create-pitch');
        });

        Route::get('/student-pitch-preview/{id}', function () {
            return view('students.student-pitch-preview');
        });


        #====DASHBOARD INTERNSHIP====#
        Route::get('/student-internship', function () {
            return view('students.student-internship');
        });

        Route::get('/student-internship-preview', function () {
            return view('students.student-internship-preview');
        });

        Route::get('/student-intership-task-details', function () {
            return view('students.student-intership-task-details');
        });

        #=====LOGOUT FOR STUDENTS====#
        Route::get('/logout', [LogoutController::class,'logoutClient']);

        #=======Payment Check WebHook=======#
        Route::get('/paymentcheck', [PaymentCheck::class,'CheckPayment']);

         #=======Course Learn next=======#
         Route::get('/course-learn/{id}/{id_next}', [courseprogress::class,'CourseProgress']);


         #=====STUDENT PLANS======#
         Route::get('/plans-and-pricing', function () {
            return view('students.student-plans');
        });


});


#============PROGUIDE DASHBOARD=============#

Route::middleware(['auth_check','proguide_auth'])->group(function () {

         #Notifications
         Route::get('/notification', [DashboardHeaderStudents::class, 'Notifications']);


        Route::get('/proguide/dashboard', function () {
            return view('proguide.dashboard');
        });

        Route::get('/proguide/livelearn', function () {
            return view('proguide.livelearn');
        });

        // Route::get('/proguide/livesession/{id}', function () {
        //     return view('proguide.livelearnsession');
        // });

        Route::get('/proguide/create-livelearn', function () {
            return view('proguide.newlivelearn');
        });

        Route::get('/proguide/course', function () {
            return view('proguide.course');
        });

        Route::get('/proguide/create-course', function () {
            return view('proguide.create-course');
        });

        Route::get('/proguide/edit-course/{id}', function () {
            return view('proguide.edit-course');
        });

        Route::get('/proguide/message', function () {
            return view('proguide.message');
        });

        Route::get('/proguide/messages/{id}', function () {
            return view('proguide.message');
        });

        Route::get('/proguide/student-progress', function () {
            return view('proguide.student-progress');
        });

        Route::get('/proguide/payments', function () {
            return view('proguide.payments');
        });

        Route::get('/proguide/schedule', function () {
            return view('proguide.schedule');
        });

        Route::get('/proguide/student-assessment', function () {
            return view('proguide.student-assessment');
        });

        Route::get('/proguide/assessment-grading', function () {
            return view('proguide.assessment-grading');
        });

        Route::get('/proguide/notifications', function () {
            return view('proguide.notifications');
        });

        Route::get('/proguide/profile', function () {
            return view('proguide.profile');
        });

        Route::get('/proguide/referal', function () {
            return view('proguide.referal');
        });


        Route::get('/proguide/mainbridge-ai', function () {
            return view('proguide.mainbridge');
        });

        Route::get('/proguide/help-center', function () {
            return view('proguide.helpcenter');
        });

        #=====LOGOUT FOR PROGUIDE====#
        Route::get('proguide/logout', [LogoutController::class,'logoutClient']);

});



#============EMPLOYER DASHBOARD=============#
Route::middleware(['auth_check','employer_auth'])->group(function () {

            Route::get('/employer/dashboard', function () {
                return view('employer.dashboard');
            });

            Route::get('/employer/internship-connect', function () {
                return view('employer.internship-connect');
            });

            Route::get('/employer/create-internship', function () {
                return view('employer.create-internship');
            });

            Route::get('/employer/internship-applicant', function () {
                return view('employer.internship-applicant');
            });

            Route::get('/employer/internship-shortlisted', function () {
                return view('employer.internship-shortlisted');
            });

            Route::get('/employer/internship-contract', function () {
                return view('employer.internship-contract');
            });

            Route::get('/employer/internship-management', function () {
                return view('employer.internship-management');
            });

            Route::get('/employer/internship-management-progress', function () {
                return view('employer.internship-management-progress');
            });

            Route::get('/employer/message', function () {
                return view('employer.message');
            });

            Route::get('/employer/internship-create-task', function () {
                return view('employer.internship-create-task');
            });

            Route::get('/employer/internship-view-task', function () {
                return view('employer.internship-view-task');
            });

            Route::get('/employer/employment', function () {
                return view('employer.employment');
            });

            Route::get('/employer/create-employment', function () {
                return view('employer.create-employment');
            });

            Route::get('/employer/employment-applicant', function () {
                return view('employer.employment-applicant');
            });

            Route::get('/employer/employment-applicant-shortlisted', function () {
                return view('employer.employment-applicant-shortlisted');
            });

            Route::get('/employer/employment-applicant-contract', function () {
                return view('employer.employment-applicant-contract');
            });

            Route::get('/employer/employee-management', function () {
                return view('employer.employee-management');
            });

            Route::get('/employer/employee-management-details', function () {
                return view('employer.employee-management-details');
            });

            Route::get('/employer/employee-management-task-view', function () {
                return view('employer.employee-management-task-view');
            });

            Route::get('/employer/schedules', function () {
                return view('employer.schedules');
            });

            Route::get('/employer/schedule-meeting', function () {
                return view('employer.schedule-meeting');
            });

            Route::get('/employer/profile', function () {
                return view('employer.profile');
            });

            Route::get('/employer/notification', function () {
                return view('employer.notification');
            });


            Route::get('/employer/mind-bridge', function () {
                return view('employer.mind-bridge');
            });

             #=====LOGOUT FOR PROGUIDE====#
             Route::get('employer/logout', [LogoutController::class,'logoutClient']);

        });

































#ADMIN AUTHENTICATION
Route::get('admin-projkonnect/login', function () {
    return view('admin.login');
});

Route::get('admin-projkonnect/forget-password', function () {
    return view('admin.forget-password');
});

Route::get('admin-projkonnect/new-password/{email}', function () {
    return view('admin.new-password');
});



#===============ADMIN DASHBOARD===================#
Route::middleware(['admin_auth'])->group(function () {


        #Only Super Admin
        Route::get('admin-projkonnect/dashboard', function () {
            return view('admin.admin-dashboard');
        });

        Route::get('admin-projkonnect/admins', function () {
            return view('admin.admin-subadmin');
        })->middleware(['admin_super']);

        Route::get('admin-projkonnect/create-admin', function () {
            return view('admin.admin-createsubadmin');
        })->middleware(['admin_super']);

        Route::get('admin-projkonnect/author', function () {
            return view('admin.admin-author');
        })->middleware(['admin_super']);

        Route::get('admin-projkonnect/create-author', function () {
            return view('admin.create-author');
        })->middleware(['admin_super']);


        #Admin Administrative
        Route::get('admin-projkonnect/user-management', function () {
            return view('admin.admin-usermanagement');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/subscription-plan', function () {
            return view('admin.admin-subscriptions');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/course-management', function () {
            return view('admin.admin-coursemanagement');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/course-management-review/{id}', function () {
            return view('admin.course-management-review');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/content-management', function () {
            return view('admin.admin-contentmanagement');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/create-faq', function () {
            return view('admin.admin-create-faq');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/edit-faq/{id}', function () {
            return view('admin.admin-edit-faq');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/contact-us', function () {
            return view('admin.admin-contactus');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/bulk-email', function () {
            return view('admin.admin-bulkemail');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/contact-us-message/{id}', function () {
            return view('admin.admin-contactus-message');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/reports', function () {
            return view('admin.admin-reports');
        })->middleware(['admin_admin']);

        Route::get('admin-projkonnect/report-details', function () {
            return view('admin.admin-report-details');
        })->middleware(['admin_admin']);



        #Author and Bloggers
        Route::get('admin-projkonnect/blogs', function () {
            return view('admin.admin-blogs');
        })->middleware(['admin_author']);

        Route::get('admin-projkonnect/create-blogs', function () {
            return view('admin.admin-create-blog');
        })->middleware(['admin_author']);

        Route::get('admin-projkonnect/edit-blogs/{id}', function () {
            return view('admin.admin-edit-blog');
        })->middleware(['admin_author']);

       

        #Proj Konnect Finance Team
        Route::get('admin-projkonnect/withdrawal-request', function () {
            return view('admin.admin-withdrawal-request');
        })->middleware(['admin_finance']);

        Route::get('admin-projkonnect/settings', function () {
            return view('admin.admin-settings');
        })->middleware(['admin_finance']);

       

        #Projkonnect General function
        Route::get('admin-projkonnect/projkonnect-ai', function () {
            return view('admin.admin-ai');
        });

        Route::get('admin-projkonnect/dashboard', function () {
            return view('admin.admin-dashboard');
        });

        Route::get('admin-projkonnect/profile', function () {
            return view('admin.admin-profile');
        });


         #=====LOGOUT FOR ADMIN====#
         Route::get('admin/logout', [LogoutController::class,'logoutAdmin']);

});



