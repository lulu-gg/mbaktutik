<style>
    .swal2-container {
        z-index: 3000 !important;
    }

    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
        /* color: #468847;
        background-color: #DFF0D8; */
        border: 1px solid #468847;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
        /* color: #B94A48;
        background-color: #F2DEDE; */
        border: 1px solid #B94A48;
    }

    .parsley-errors-list {
        margin: 2px 0 3px;
        padding: 0;
        list-style-type: none;
        font-size: 0.9em;
        line-height: 0.9em;
        opacity: 0;
        color: #B94A48;

        transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        -moz-transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
        opacity: 1;
    }
</style>
