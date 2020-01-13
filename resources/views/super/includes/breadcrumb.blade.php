<div class="bread_wrapper">
  <div class="container">
    <nav aria-label="Breadcrumbs">
      <ol class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="{{ surl('/index') }}">{{ trans('admin.dashboard') }}</a>
        </li>
        <li class="breadcrumbs__item">
          <a href="{{ sturl('/show') }}">{{ trans('admin.profile') }}</a>
        </li>
        <li class="breadcrumbs__item breadcrumbs__item--is-current">
          <span aria-current="location">{{ surl('/edit') }}</span>
        </li>
      </ol>
    </nav>
  </div>
</div>
