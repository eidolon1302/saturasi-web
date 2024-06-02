#!/bin/sh

# Update package list
apt-get update

# Install libssl1.0 if it's not already installed
if ! dpkg -s libssl1.0.0 >/dev/null 2>&1; then
  apt-get install -y libssl1.0.0
fi

# Install other necessary dependencies
apt-get install -y libssl-dev

# Add any other setup steps here
