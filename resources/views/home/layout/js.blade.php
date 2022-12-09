

    <script src="/home/plugins/jquery/jquery.min.js"></script>
    <script src="/home/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/home/plugins/simplebar/simplebar.min.js"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

    <script src="/home/plugins/apexcharts/apexcharts.js"></script>
    <script src="/home/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="/home/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="/home/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="/home/plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>

    <script src="/home/plugins/daterangepicker/moment.min.js"></script>
    <script src="/home/plugins/daterangepicker/daterangepicker.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>

    <script>
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        // $(".input-number").keydown(function(e) {
        //     // Allow: backspace, delete, tab, escape, enter and .
        //     if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        //         // Allow: Ctrl+A
        //         (e.keyCode == 65 && e.ctrlKey === true) ||
        //         // Allow: home, end, left, right
        //         (e.keyCode >= 35 && e.keyCode <= 39)) {
        //         // let it happen, don't do anything
        //         return;
        //     }
        //     // Ensure that it is a number and stop the keypress
        //     if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        //         e.preventDefault();
        //     }
        // });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>


    <script type="text/javascript">
        function reply(caller) {

            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
            document.getElementById('commentId').value = $(caller).attr('data-Commentid');
        }

        function reply_close(caller) {
            $('.replyDiv').hide();
        }
    </script>

    <script type="text/javascript">
        function questreply(caller) {

            $('.questreplyDiv').insertAfter($(caller));
            $('.questreplyDiv').show();
            document.getElementById('questId').value = $(caller).attr('data-Questionid');
        }

        function questreply_close(caller) {
            $('.questreplyDiv').hide();
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>



    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="/home/plugins/toaster/toastr.min.js"></script>
    <script src="/home/js/mono.js"></script>
    <script src="/home/js/chart.js"></script>
    <script src="/home/js/map.js"></script>
    <script src="/home/js/custom.js"></script>