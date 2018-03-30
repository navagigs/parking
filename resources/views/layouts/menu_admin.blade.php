<ul class="list-unstyled sidebar-left">
	<li class="{{ (\Request::route()->getName() == 'internal.dashboard') ? 'active' : '' }}">
		<a href="{{ route('internal.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> Home </a>
	</li>
	<li class="{{ (\Request::route()->getName() == 'internal.partner') ? 'active' : '' }} {{ (\Request::route()->getName() == 'internal.partner.create') ? 'active' : '' }} {{ (\Request::route()->getName() == 'internal.partner.update') ? 'active' : '' }}{{ (\Request::route()->getName() == 'internal.floor') ? 'active' : '' }}{{ (\Request::route()->getName() == 'internal.block') ? 'active' : '' }}">
		<a href="javascript:void(0);"><i class="zmdi zmdi-accounts-alt"></i> Kemitraan <span class="zmdi zmdi-plus"></span></a>

		<ul class="nav nav-second-level">
			<li class="{{ (\Request::route()->getName() == 'internal.partner') ? 'active-second' : '' }} {{ (\Request::route()->getName() == 'internal.partner.create') ? 'active-second' : '' }} {{ (\Request::route()->getName() == 'internal.partner.update') ? 'active-second' : '' }}{{ (\Request::route()->getName() == 'internal.floor') ? 'active-second' : '' }}{{ (\Request::route()->getName() == 'internal.block') ? 'active-second' : '' }}">
			<a href="{{ route('internal.partner') }}">Mitra</a></li>
			<li class="{{ (\Request::route()->getName() == 'internal.media') ? 'active-second' : '' }}"><a href="{{ route('internal.media') }}">Media</a></li>
			<li class=""><a href="{{ route('internal.partner') }}">Fasilitas</a></li>
		</ul>
	</li>

	<li class="{{ (\Request::route()->getName() == 'internal.category') ? 'active' : '' }} {{ (\Request::route()->getName() == 'internal.news') ? 'active' : '' }}">
		<a href="javascript:void(0);"><i class="zmdi zmdi-laptop"></i> Website <span class="zmdi zmdi-plus"></span></a>
		<ul class="nav nav-second-level">
			<li class="{{ (\Request::route()->getName() == 'internal.category') ? 'active-second' : '' }}"><a href="{{ route('internal.category') }}">Kategori</a></li>
			<li class="{{ (\Request::route()->getName() == 'internal.news') ? 'active-second' : '' }}"><a href="{{ route('internal.news') }}">Berita</a></li>
		</ul>
	</ul>