#          __                __            
#    _____/ /_  ____  ____  / /____  _____ 
#   / ___/ __ \/ __ \/ __ \/ __/ _ \/ ___/  __   
#  /__  / / / / /_/ / /_/ / /_/  __/ / ____/ /__ _   __
# /____/_/ /_/\____/\____/\__/\___/_/ / __  / _ | | / /
#       -*- By ShooterDev -*-        / /_/ /  __| |/ / 
#                                    \____/\___/|___/                  
# =====================================================
from django.conf.urls import url
from django.urls import path, include

from app import views

urlpatterns = [
    path('', views.index, name='index'),
]
