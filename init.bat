@echo off
@setlocal
set BASE_PATH=%~dp0
if "%BASH_COMMAND%" == "" set BASH_COMMAND=bash -c
"%BASH_COMMAND%" "%BASE_PATH%init" %*
@endlocal