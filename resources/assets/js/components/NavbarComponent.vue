<template>
    <b-navbar toggleable="md" type="dark" variant="info">
        <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
        <b-navbar-brand href="/">ReqestFood</b-navbar-brand>
        <b-collapse is-nav id="nav_collapse">
            <b-navbar-nav>
                <b-nav-item href="/requests">Заказы</b-nav-item>
                <b-nav-item href="/clients">Клиенты</b-nav-item>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</template>