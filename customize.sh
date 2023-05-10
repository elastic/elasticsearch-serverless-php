#!/usr/bin/env bash

dir=$(dirname "$(realpath -s "$0")")

lang=$1
LANG="${lang^}"

# Update README.md
sed -i "s/<<\[lang\]>>/$lang/" $dir/README_TEMPLATE.md
sed -i "s/<<\[LANG\]>>/$LANG/" $dir/README_TEMPLATE.md

# CONTRIBUTING.md
sed -i "s/<<\[lang\]>>/$lang/" $dir/CONTRIBUTING.md
sed -i "s/<<\[LANG\]>>/$LANG/" $dir/CONTRIBUTING.md

# docs/getting-started.MDX
sed -i "s/<<\[lang\]>>/$lang/" $dir/docs/getting-started.MDX
sed -i "s/<<\[LANG\]>>/$LANG/" $dir/docs/getting-started.MDX

# docs/landing-page.MDX
sed -i "s/<<\[lang\]>>/$lang/" $dir/docs/landing-page.MDX
sed -i "s/<<\[LANG\]>>/$LANG/" $dir/docs/landing-page.MDX

# .github/workflows/test.yml
sed -i "s/<<\[lang\]>>/$lang/" $dir/.github/workflows/test.yml
sed -i "s/<<\[LANG\]>>/$LANG/" $dir/.github/workflows/test.yml

# Clean up
rm README.md
mv README_TEMPLATE.md README.md
rm customize