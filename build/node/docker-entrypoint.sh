#!/usr/bin/env bash

function initialize()
{
  [ -f /app/package.json ] \
  && (echo "[OK] Starting node development server" && npm start)

  local returnval=$?
  [[ $returnval -eq 0 ]] \
  || (echo "[WARNING] React app does not seem to be initialized" && npx create-react-app . && npm start)


  return $returnval
}

initialize
