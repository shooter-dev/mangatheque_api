#          __                __
#    _____/ /_  ____  ____  / /____  _____
#   / ___/ __ \/ __ \/ __ \/ __/ _ \/ ___/  __
#  /__  / / / / /_/ / /_/ / /_/  __/ / ____/ /__ _   __
# /____/_/ /_/\____/\____/\__/\___/_/ / __  / _ | | / /
#       -*- By ShooterDev -*-        / /_/ /  __| |/ /
#                                    \____/\___/|___/
# =====================================================
from django.contrib import admin
from django.conf.urls import include, url
from django.conf.urls.static import static

from core import settings

urlpatterns = [
    url(r'', include('app.urls')),
    url(r'^api/', include('api.urls')),
    url(r'^admin/', admin.site.urls)
] + static(
    settings.STATIC_URL,
    document_root=settings.STATIC_ROOT
)

if settings.DEBUG:
    import debug_toolbar
    urlpatterns = [
        url(r'^__debug__/', include(debug_toolbar.urls)),
    ] + urlpatterns
