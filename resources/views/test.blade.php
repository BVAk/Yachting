<??>

<script type="text/javascript">
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML('ghjghgj');
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>


<button onclick="printContent('2')">Print</button>
