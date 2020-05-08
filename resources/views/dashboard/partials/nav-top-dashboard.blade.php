<!-- As a heading -->
<nav class="navbar navbar-light bg-light shadow-sm"
    style="position: absolute; width: 100%; height: 75px; border-bottom: 1px solid rgb(235, 235, 235)">
    <span class="navbar-brand mb-0" style="margin-left: 100px"> <i class="fa fa-user mr-2"></i> <span class="text-secondary">Hey,</span> {{Auth::user()->name}}</span>
</nav>