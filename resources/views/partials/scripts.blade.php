<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

{{--for header name design--}}
<script src="{{asset('assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->

<script>
    var app_name = '{{env('APP_NAME')}}';
    var typed = new Typed("#kt_typedjs_example_1", {
        strings: [ app_name ],
        typeSpeed: 150
    });
</script>
