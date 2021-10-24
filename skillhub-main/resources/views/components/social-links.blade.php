<ul class="footer-social">
    @if($sett->faceback!==null)
    <li><a href="{{$sett->twitter}}" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
    @endif

    @if($sett->twitter!==null)
    <li><a href="{{$sett->facebook}}" class="twitter" target="_blank"><i class="fa fa-facebook"></i></a></li>

    @endif
    @if($sett->instagram!==null)
    <li><a href="{{$sett->instagram}}"class="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>

    @endif
    @if($sett->linkedin!==null)
    <li><a href="{{$sett->linkedin}}" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>

    @endif
    @if($sett->youtube!==null)
    <li><a href="{{$sett->youtube}}" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
</ul>

    @endif

