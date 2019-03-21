@echo off
cd public
START php -S 0.0.0.0:9080
cd ..
cd MS\DB\Master
START php -S 0.0.0.0:9081
cd ..
cd ..
cd ..
