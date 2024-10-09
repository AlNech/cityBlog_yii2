#   Сайт с отзывами городов


##  USAGE



`
Login: admin
Password: admin1234
`

##  USED


For choice some city in create form

`
use kartik\select2\Select2;
`

For preloader

`
use timurmelnikov\widgets\LoadingOverlayPjax;
`

For API used service dadata

##  IMPORTANT


If you want change session timeout with choiced city you should change value at frontend/ReviewController session['city]['timelife']
(Default it is for 10 sec)



