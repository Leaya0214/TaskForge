<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
  auth: Object,
});
interface PageProps {
  auth: {
    user: AuthUser | null;
  };
  [key: string]: any; // অন্য props থাকলে
}
const page = usePage<PageProps>();;

const userRole = computed(() => page.props.value.auth?.user?.role ?? 'undefined');

alert(userRole.value)
const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },

    {
        title: 'Task',
        href: route('task.index', {}, false),
        icon: LayoutGrid,
        children: [
            {
                title: 'All Tasks',
                href: '/dashboard/tasks',
                icon: Folder,
            },
            {
                title: 'Create Task',
                href: '/dashboard/tasks/create',
                icon: BookOpen,
            },
        ],
    },
    {
        title: 'Manage User',
        href: '/users',
        icon: LayoutGrid,
    },
    // {
    //     title: 'Role & Permission',
    //     href: route('role-permission.index', {}, false),
    //     icon: Folder,
    // },
];

const filteredNavItems = computed(() => {
  return mainNavItems.filter((item) => {
    // Only Admin can see Manage User
    if (item.title === 'Manage User' && userRole.value !== 'Admin') {
      return false;
    }

    // Example: Only Admin & Manager can see Create Task
    if (item.title === 'Task' && item.children) {
      item.children = item.children.filter((child) => {
        if (child.title === 'Create Task') {
          return userRole.value === 'Admin' || userRole.value === 'Manager';
        }
        return true; // All roles can see All Tasks
      });
    }

    return true;
  });
});
const footerNavItems: NavItem[] = [
    // {
    //     title: 'Github Repo',
    //     href: 'https://github.com/laravel/vue-starter-kit',
    //     icon: Folder,
    // },
    // {
    //     title: 'Documentation',
    //     href: 'https://laravel.com/docs/starter-kits#vue',
    //     icon: BookOpen,
    // },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                        <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
