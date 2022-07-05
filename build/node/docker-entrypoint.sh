#!/usr/bin/env bash

function initialize()
{
  [ -f /app/package.json ] \
  && (echo "[OK] Starting node development server" && npm start)

  local returnval=$?
  [[ $returnval -eq 0 ]] \
  || (echo "[WARNING] React Native app does not seem to be initialized" && expo init . --template blank && npm start)


  return $returnval
}

initialize
