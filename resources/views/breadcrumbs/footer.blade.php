<!-- Footer -->
<footer class="page-footer font-small footer-grad">

    <!-- Copyright - DO NOT REMOVE WITHOUT PERMISSION -->
    <div class="footer-copyright text-center py-3">
        <a href="{{ config('app.url') }}"> {{ config('app.name') . ' ' . config('app.release') }} &copy; 2019-{{ now()->year }} - {{__('messages.footer_copy')}}. Took {{ round(microtime(true) - LARAVEL_START, 3)  }} seconds.</a>
    </div>
    <!-- Copyright -->
    <!-- GNU General Public License (https://www.gnu.org/licenses/gpl-3.0.en.html) Built by Miguel N. -->

</footer>
<!-- Footer -->
